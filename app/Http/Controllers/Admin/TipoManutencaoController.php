<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\TipoManutencao;
use Illuminate\Support\Facades\Input;

class TipoManutencaoController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaTipoManutencao = TipoManutencao::Listar($filtro);
        return view('admin.tipoManutencao.index')->with(compact('listaTipoManutencao'));
    }

    public function criar()
    {
        $tipoManutencao = null;
        return view('admin.tipoManutencao.criar')->with(compact('tipoManutencao'));
    }

    public function mostrar($codigo)
    {
        $tipoManutencao = TipoManutencao::where("codigo", $codigo)->first();
        return view('admin.tipoManutencao.criar')->with(compact('tipoManutencao'));
    }

    public function gravar()
    {
        $input = Input::all();
        $retorno = TipoManutencao::Gravar($input);
        return redirect('/tipoManutencao');
    }

}