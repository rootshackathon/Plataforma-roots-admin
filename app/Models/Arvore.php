<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class Arvore extends Model
{
    protected $table = "arvore";
    protected $fillable = ["codigo", "sequencia", "descricao", "foto", "latitude", "longitude", "ponto_referencia", "status", "codigo_pessoa", "codigo_especie", "codigo_regiao", "created_at", "updated_at"];
    
    public static function Listar($filtro)
    {
        $listaResultado = Arvore::with('pessoa', 'especie', 'regiao', 'situacaoArvore')->orderBy('descricao', 'ASC');

        if ($filtro) 
        {
            $listaResultado = $listaResultado->where('descricao', 'like', '%' . $filtro . '%');
        }

        $listaResultado = $listaResultado->orderBy('descricao', 'asc');
        $listaResultado = Util::FiltroQueryParametro($listaResultado);
        $listaResultado = $listaResultado->paginate(Util::$quantidadePaginacao);

        return $listaResultado;
    }

    public static function Gravar(array $input)
    {
        $retorno = false;
        DB::beginTransaction();
        
        try 
        {
            $arvore = new Arvore();
            $input = $arvore->fill($input)->attributes;

            $input["status"] = (!empty($input["status"])) ? $input["status"] :  0;

            if (empty($input["codigo"])) 
            {
                $input["codigo"] = Util::NewGuid();
                $input["sequencia"] = Util::Sequencia($arvore);
                $input["foto"] = null;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $arvore->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $arvore = Arvore::where("codigo", $input["codigo"])->update($input);

                if ($arvore) 
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
            
            Arvore::where("codigo", $input["codigo"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, "codigo", "codigo_pessoa");
    }

    public function especie()
    {
        return $this->hasOne(Especie::class, "codigo", "codigo_especie");
    }

    public function regiao()
    {
        return $this->hasOne(Regiao::class, "codigo", "codigo_regiao");
    }

    public function situacaoArvore()
    {
        return $this->hasMany(SituacaoArvore::class, "codigo_arvore", "codigo");
    }
}
