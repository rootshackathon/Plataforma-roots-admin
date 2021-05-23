<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MensagemRetornoAplicacao;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Util;
use App\Models\Arvore;
use App\Models\TipoManutencao;
use App\Models\Manutencao;
use App\Models\Usuario;
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
        $listaTipoManutencao = TipoManutencao::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaStatusManutencao = Util::ListaStatusManutencao();
        return view('admin.manutencao.index')->with(compact('listaManutencao', 'listaTipoManutencao', 'listaStatusManutencao'));
    }

    public function criar()
    {
        $manutencao = null;
        $listaTipoManutencao = TipoManutencao::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaArvore = Arvore::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaStatusManutencao = Util::ListaStatusManutencao();
        return view('admin.manutencao.criar')->with(compact('manutencao', 'listaTipoManutencao', 'listaArvore', 'listaStatusManutencao'));
    }

    public function mostrar($codigo)
    {
        $manutencao = Manutencao::with('tipoManutencao', 'arvore')->where("codigo", $codigo)->first();
        $listaTipoManutencao = TipoManutencao::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaArvore = Arvore::where("status", 1)->orderBy("descricao", "ASC")->get();
        $listaStatusManutencao = Util::ListaStatusManutencao();
        return view('admin.manutencao.criar')->with(compact('manutencao', 'listaTipoManutencao', 'listaArvore', 'listaStatusManutencao'));
    }

    public function gravar()
    {
        $input = Input::all();

        $codigoPesooa = Usuario::with('pessoa')->where("codigo", Auth::id())->first();
        $input["codigo_pessoa"] = $codigoPesooa->pessoa->codigo; 

        $retorno = Manutencao::Gravar($input);
        return MensagemRetornoAplicacao::RetornoMensagemCadastro($retorno, "/manutencao");
    }

}