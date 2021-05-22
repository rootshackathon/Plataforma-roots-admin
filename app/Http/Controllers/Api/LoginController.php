<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function login(Request $request)
    {
        
        $login = false;
        $mensagem = "Não autorizado";
        $body = null;
        $credencial = $request->only('email', 'password');
        
        if(Auth::attempt($credencial, true))
        {
            $login = true;
            $mensagem = "Ok";
            $body = Usuario::with("pessoa", "tipoUsuario")->select("codigo", "nome", "email", "codigo_pessoa", "codigo_tipo_usuario")->where("email", $credencial["email"])->first();
        
        }
        
        return ["status" => $login, "body" => $body, "mensagem" => $mensagem];

    }
}
