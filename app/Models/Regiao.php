<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class Regiao extends Model
{
    protected $table = "regiao";
    protected $fillable = ["codigo", "sequencia", "descricao", "latitude", "longitude", "distancia_maxima_raio", "ponto_referencia", "status", "created_at", "updated_at"];
    
    public static function Listar($filtro)
    {
        $listaResultado = Regiao::orderBy('descricao', 'ASC');

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
            $regiao = new Regiao();
            $input = $regiao->fill($input)->attributes;

            if (empty($input["codigo"])) 
            {
                $input["codigo"] = Util::NewGuid();
                $input["sequencia"] = Util::Sequencia($regiao);
                $input["status"] = 1;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $regiao->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $regiao = Regiao::where("codigo", $input["codigo"])->update($input);

                if ($regiao) 
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
            
            Regiao::where("codigo", $input["codigo"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }
}
