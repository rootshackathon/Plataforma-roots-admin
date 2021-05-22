<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\Arvore;
use Illuminate\Support\Facades\Input;

class ArvoreController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaArvore = Arvore::Listar($filtro);
        return $listaArvore;
    }

    public function mostrar($codigo)
    {
        $arvore = Arvore::with('pessoa', 'especie', 'regiao')->where("codigo", $codigo)->first();
        return $arvore;
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = Arvore::Gravar($input);
        
        $mensagem = ["status" => false, "mensagem" => "Todos os campos são obrigatórios."];
        
        if($retorno)
        {
            $mensagem = ["status" => true, "mensagem" => "Sucesso"];    
        }

        return $mensagem;
    }

}