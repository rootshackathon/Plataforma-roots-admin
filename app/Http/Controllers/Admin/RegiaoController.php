<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MensagemRetornoAplicacao;
use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\Regiao;
use Illuminate\Support\Facades\Input;

class RegiaoController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaRegiao = Regiao::Listar($filtro);
        return view('admin.regiao.index')->with(compact('listaRegiao'));
    }

    public function criar()
    {
        $regiao = null;
        return view('admin.regiao.criar')->with(compact('regiao'));
    }

    public function mostrar($codigo)
    {
        $regiao = Regiao::where("codigo", $codigo)->first();
        return view('admin.regiao.criar')->with(compact('regiao'));
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = Regiao::Gravar($input);
        return MensagemRetornoAplicacao::RetornoMensagemCadastro($retorno, "/regiao");
    }

}