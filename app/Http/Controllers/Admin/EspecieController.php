<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MensagemRetornoAplicacao;
use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\Especie;
use Illuminate\Support\Facades\Input;

class EspecieController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaEspecie = Especie::Listar($filtro);
        return view('admin.especie.index')->with(compact('listaEspecie'));
    }

    public function criar()
    {
        $especie = null;
        return view('admin.especie.criar')->with(compact('especie'));
    }

    public function mostrar($codigo)
    {
        $especie = Especie::where("codigo", $codigo)->first();
        return view('admin.especie.criar')->with(compact('especie'));
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = Especie::Gravar($input);
        return MensagemRetornoAplicacao::RetornoMensagemCadastro($retorno, "/especie");
    }

}