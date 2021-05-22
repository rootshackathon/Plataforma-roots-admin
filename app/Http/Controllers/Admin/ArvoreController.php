<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\MensagemRetornoAplicacao;
use App\Helpers\Util;
use App\Models\Arvore;
use App\Models\Especie;
use App\Models\Regiao;
use App\Models\Usuario;
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
        $listaEspecie = Especie::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaRegiao = Regiao::where("status", 1)->orderBy("descricao", "ASC")->get();
        return view('admin.arvore.index')->with(compact('listaArvore', 'listaEspecie', 'listaRegiao'));
    }

    public function criar()
    {
        $arvore = null;
        $listaEspecie = Especie::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaRegiao = Regiao::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaUsuario = Usuario::with("pessoa")->where("status", 1)->where("codigo_tipo_usuario", 2)->orderBy("nome", "ASC")->get();
        return view('admin.arvore.criar')->with(compact('arvore', 'listaEspecie', 'listaRegiao', 'listaUsuario'));
    }

    public function mostrar($codigo)
    {
        $arvore = Arvore::with('pessoa', 'especie', 'regiao')->where("codigo", $codigo)->first();
        $listaEspecie = Especie::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaRegiao = Regiao::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaUsuario = Usuario::with("pessoa")->where("status", 1)->where("codigo_tipo_usuario", 2)->orderBy("nome", "ASC")->get();
        return view('admin.arvore.criar')->with(compact('arvore', 'listaEspecie', 'listaRegiao', 'listaUsuario'));
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = Arvore::Gravar($input);
        return MensagemRetornoAplicacao::RetornoMensagemCadastro($retorno, "/arvores");
    }

}