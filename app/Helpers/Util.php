<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Util
{
    public static $quantidadePaginacao = 100;

    public static function DataAtual()
    {
        return date('Y-m-d H:i:s');
    }

    public static function ConverteData($data)
    {
        if (substr($data, 2, 1) == "/")
        {
            $dd = substr($data, 0, 2);
            $mm = substr($data, 3, 2);
            $aa = substr($data, 6, 4);
            $time = substr($data, 11, 8);
            if ($time != "")
                $data = $aa . "-" . $mm . "-" . $dd . " " . $time;
            else
                $data = $aa . "-" . $mm . "-" . $dd;
        }
        else
        {
            $dd = substr($data, 8, 2);
            $mm = substr($data, 5, 2);
            $aa = substr($data, 0, 4);
            $time = substr($data, 11, 8);
            $data = $dd . "/" . $mm . "/" . $aa;
        }
        if ($data == '//')
        {
            $data = '';
        }

        return $data;
    }

    public static function NewGuid()
    {
        return Str::uuid()->toString();
    }

    public static function Sequencia($model)
    {
        return $model->max("sequencia") + 1;
    }

    public static function RetornarUrlAnterior()
    {
        $uri = Route::getCurrentRoute()->uri();
        if($uri)
        {
            $lista = explode("/", $uri);
            if(count($lista) > 0)
            {
                $uri = $lista[0];
            }
        }

        $urlRedirect = request()->server("HTTP_REFERER");
        if(empty($urlRedirect)){
                
            return "/{$uri}";
        }

        return request()->server("HTTP_REFERER");
    }

    public static function ParametroGetUrl($nome)
    {
        $retorno = null;

        if (count(Request::capture()->request) > 0)
        {

            $filtro = Request::capture()->query();

            if (array_key_exists($nome, $filtro))
            {
                $retorno = $filtro[$nome];
            }
        }

        return $retorno;
    }

    public static function FiltroQueryParametro($objeto)
    {

        if(Request::capture()->request){
                    
            $queryParametro = Request::capture()->query();
            
            if ($queryParametro)
            {
                if(array_key_exists("filtro", $queryParametro))
                {
                    unset($queryParametro["filtro"]);    
                }

                if(array_key_exists("page", $queryParametro))
                {
                    unset($queryParametro["page"]);    
                }
                
                foreach ($queryParametro as $campo => $valor)
                {
                    if (!empty($valor)) 
                    {
                        $objeto->where($campo, $valor);
                    }
                }
            }
        
        }
        
        return $objeto;
    }

    public static function CriarSessionFlash($nome, $dados)
    {
        $dados = Session::flash($nome, $dados);

        return $dados;
    }

    public static function ListaStatusManutencao()
    {
        //1 - "Solicitado" 
        //2 - "Em andamento"
        //3 - "Concluído"
        //4 - "Parado"
        //5 - "Cancelado" 
        
        $lista = [
            ["codigo" => 1, "descricao" => "Solicitado"],
            ["codigo" => 2, "descricao" => "Em andamento"],
            ["codigo" => 3, "descricao" => "Concluído"],
            ["codigo" => 4, "descricao" => "Parado"],
            ["codigo" => 5, "descricao" => "Cancelado"]
        ];

        return $lista;
    }

    public static function StatusLabelManutencao($codigo)
    {
        $retorno = "";

        switch ($codigo)
        {
            case 1:
                $retorno = '<span class="badge badge-primary">Solicitado</span>';
                break;
            case 2:
                $retorno = '<span class="badge badge-warning">Em andamento</span>';
                break;
            case 3:
                $retorno = '<span class="badge badge-success">Concluído</span>';
                break;
            case 4:
                $retorno = '<span class="badge badge-secondary">Parado</span>';
                break;
            case 5:
                $retorno = '<span class="badge badge-danger">Cancelado</span>';
                break;        
            default:
                break;
        }

        return $retorno;
    }

}
