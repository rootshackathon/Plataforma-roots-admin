<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class SituacaoArvore extends Model
{
    protected $table = "situacao_arvore";
    protected $fillable = ["codigo", "sequencia", "data", "observacao", "status", "created_at", "updated_at", "codigo_tipo_situacao_arvore", "codigo_arvore"];
    
    public static function Listar($filtro)
    {
        $listaResultado = SituacaoArvore::with('tipoSituacaoArvore', 'arvore')->orderBy('sequencia', 'ASC');

        if ($filtro) 
        {
            $listaResultado = $listaResultado->where('descricao', 'like', '%' . $filtro . '%');
        }

        $listaResultado = $listaResultado->paginate(Util::$quantidadePaginacao);

        return $listaResultado;
    }

    public static function Gravar(array $input)
    {
        $retorno = false;
        DB::beginTransaction();
        
        try 
        {
            $situacaoArvore = new SituacaoArvore();
            $input = $situacaoArvore->fill($input)->attributes;

            $input["data"] = (!empty($input["data"])) ? Util::ConverteData($input["data"]) : Util::DataAtual();
            $input["observacao"] = (!empty($input["observacao"])) ? $input["observacao"] : null;

            if (empty($input["codigo"])) 
            {
                $input["codigo"] = Util::NewGuid();
                $input["sequencia"] = Util::Sequencia($situacaoArvore);
                $input["status"] = 1;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $situacaoArvore->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $situacaoArvore = SituacaoArvore::where("codigo", $input["codigo"])->update($input);

                if ($situacaoArvore) 
                {
                    $retorno = true;
                }
            }

            if($retorno)
            {
                DB::commit();
            }

        } 
        catch (\Exception $e) 
        {    
            DB::rollBack();
            return false;
        }

        return $retorno;
    }

    public static function Remover(array $input)
    {
        $retorno = false;
        DB::beginTransaction();

        try {
            
            SituacaoArvore::where("codigo", $input["codigo"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }

    public function tipoSituacaoArvore()
    {
        return $this->hasOne(tipoSituacaoArvore::class, "codigo", "codigo_tipo_situacao_arvore");
    }

    public function arvore()
    {
        return $this->hasOne(Arvore::class, "codigo", "codigo_arvore");
    }
}
