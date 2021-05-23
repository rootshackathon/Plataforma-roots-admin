<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class Manutencao extends Model
{
    protected $table = "manutencao";
    protected $fillable = ["codigo", "sequencia", "descricao", "data", "observacao", "status_manutencao", "status", "created_at", "updated_at", "codigo_pessoa", "codigo_pessoa_manutencao", "codigo_tipo_manutencao", "codigo_arvore"];
    
    public static function Listar($filtro)
    {
        $listaResultado = Manutencao::with('tipoManutencao', 'arvore')->orderBy('descricao', 'ASC');

        if ($filtro) 
        {
            $listaResultado = $listaResultado->where('descricao', 'like', '%' . $filtro . '%');
        }

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
            $manutencao = new Manutencao();
            $input = $manutencao->fill($input)->attributes;

            $input["codigo_pessoa_manutencao"] = 1;

            if (empty($input["codigo"])) 
            {
                $input["codigo"] = Util::NewGuid();
                $input["sequencia"] = Util::Sequencia($manutencao);
                $input["status"] = 1;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $manutencao->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $manutencao = Manutencao::where("codigo", $input["codigo"])->update($input);

                if ($manutencao) 
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
            
            Manutencao::where("codigo", $input["codigo"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }

    public function tipoManutencao()
    {
        return $this->hasOne(TipoManutencao::class, "codigo", "codigo_tipo_manutencao");
    }

    public function arvore()
    {
        return $this->hasOne(Arvore::class, "codigo", "codigo_arvore");
    }
}
