<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\Manutencao;
use Illuminate\Support\Facades\Input;

class ManutencaoController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaManutencao = Manutencao::Listar($filtro);
        return $listaManutencao;
    }

    public function mostrar($codigo)
    {
        $manutencao = Manutencao::with('arvore')->where("codigo", $codigo)->first();
        return $manutencao;
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = Manutencao::Gravar($input);
        
        $mensagem = ["status" => false, "mensagem" => "Todos os campos são obrigatórios."];
        
        if($retorno)
        {
            $mensagem = ["status" => true, "mensagem" => "Sucesso"];    
        }

        return $mensagem;
    }

}