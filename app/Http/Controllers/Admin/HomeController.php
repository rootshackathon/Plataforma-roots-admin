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
        return view('admin.home.index');
    }

}