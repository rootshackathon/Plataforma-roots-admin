<?php

namespace App\Helpers;

class MensagemRetornoAplicacao
{
    public static $sessaoMensagemRetornoAplicacao = "sessaoMensagemRetornoAplicacao";

    public static function RetornoMensagemCadastro($status, $redirecinar = "", $sessao = true)
    {
        $retorno = redirect()->back();
        
        $mensagem = ["class" => "danger", "mensagem" => "Todos os campos são obrigatórios."];
        
        if($status)
        {
            $mensagem = ["class" => "success", "mensagem" => "Sucesso."];
        }

        if($sessao)
        {
            Util::CriarSessionFlash(MensagemRetornoAplicacao::$sessaoMensagemRetornoAplicacao, $mensagem);
        }

        if($status && $redirecinar){
            return redirect($redirecinar);
        }

        return $retorno;
    }
}
