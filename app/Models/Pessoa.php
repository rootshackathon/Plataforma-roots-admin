<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class Pessoa extends Model
{
    protected $table = "pessoa";
    protected $fillable = ["id", "sequencia", "nome", "cpf", "telefone", "status", "created_at", "updated_at"];
    public $timestamps = true;
    
    public static function Listar($filtro)
    {
        $listaResultado = Pessoa::orderBy('nome', 'ASC');

        if ($filtro) 
        {
            $listaResultado = $listaResultado->where('nome', 'like', '%' . $filtro . '%');
        }

        $listaResultado = $listaResultado->paginate(Util::$quantidadePaginacao);

        return $listaResultado;
    }

    public static function Salvar(array $input)
    {
        $retorno = false;
        DB::beginTransaction();

        try 
        {
            $input["cpf"] = (($input["cpf"]) ? Funcoes::SoNumero($input["cpf"]) : "");
            $input["telefone"] = (($input["telefone"]) ? Funcoes::SoNumero($input["telefone"]) : "");
            
            $pessoa = new Pessoa();
            $input = $pessoa->fill($input)->attributes;

            if (empty($input["id"])) 
            {
                $input["id"] = Ultil::NewGuid();
                $input["sequencia"] = Ultil::Sequencia($pessoa);
                $input["status"] = 1;
                $input["created_at"] = Util::DataAtual();
                $input["updated_at"] = Util::DataAtual();
                $pessoa->insert($input);
                $retorno = true;
            } 
            else 
            {
                $input["updated_at"] = Util::DataAtual();
                $pessoa = Pessoa::where("id", $input["id"])->update($input);

                if ($pessoa) 
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
            
            Pessoa::where("id", $input["id"])->delete();
            $retorno = true;
            DB::commit();
        
        } catch (\Exception $e) {
            
            DB::rollBack();
            return false;
        
        }

        return $retorno;
    }
}
