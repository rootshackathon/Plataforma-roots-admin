<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Util;
use App\Models\Especie;

class EspecieController extends Controller
{
    public function __construct()
    {
    
    }

    public function index()
    {
        $filtro = Util::ParametroGetUrl("filtro");
        $listaEspecie = Especie::Listar($filtro);
        return $listaEspecie;
    }

}