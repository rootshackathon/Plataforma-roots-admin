<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    
    }

    public function Index()
    {
        dd("Home");
        //return view('admin.home.index');
    }

}