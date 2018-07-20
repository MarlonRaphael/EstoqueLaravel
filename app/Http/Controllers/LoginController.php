<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');
        if(Auth::attempt($credenciais))
        {
            return "Usuário ".Auth::user()->name." logado com sucesso";
        }

        Auth::logout();

        return "As credencias não são válidas";
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->action('/login');
    }
}
