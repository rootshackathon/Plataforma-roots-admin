<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\TipoSituacaoArvore;

class TipoSituacaoArvoreController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaTipoSituacaoArvore = TipoSituacaoArvore::Listar($filtro);
        return $listaTipoSituacaoArvore;
    }

}