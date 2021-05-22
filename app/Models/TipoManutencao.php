<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class TipoManutencao extends Model
{
    protected $table = "tipo_manutencao";
    protected $fillable = ["codigo", "sequencia", "descricao", "status", "created_at", "updated_at"];
    
    public static function Listar($filtro)
    {
        $listaResultado = TipoManutencao::orderBy('descricao', 'ASC');

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
            $tipoManutencao = new TipoManutencao();
            $input = $tipoManutencao->fill($input)->attributes;

            if (empty($input["codigo"])) 
            {
                $input["codigo"] = Util::NewGuid();
                $input["sequencia"] = Util::Sequencia($tipoManutencao);
                $input["status"] = 1;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $tipoManutencao->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $tipoManutencao = TipoManutencao::where("codigo", $input["codigo"])->update($input);

                if ($tipoManutencao) 
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
            
            TipoManutencao::where("codigo", $input["codigo"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }
}
