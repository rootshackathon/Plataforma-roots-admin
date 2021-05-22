<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\SituacaoArvore;
use Illuminate\Support\Facades\Input;

class SituacaoArvoreController extends Controller
{
    public function __construct()
    {
    
    }

    public function gravar()
    {
        
        $retorno = false;
        $input = Input::all();
        
        if(count($input) > 0){
            foreach($input as $valorInput)
            {
                $retorno = SituacaoArvore::Gravar($valorInput);
            }
        }

        $mensagem = ["status" => false, "mensagem" => "Todos os campos são obrigatórios."];
        
        if($retorno)
        {
            $mensagem = ["status" => true, "mensagem" => "Sucesso"];    
        }

        return $mensagem;
    }

}