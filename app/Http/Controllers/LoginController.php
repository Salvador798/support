<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // Validar Credenciales
        if (!Auth::validate($request->only('email', 'password'))) {
            return redirect()->to('login')->withErrors('Credenciales incorrectas');
        }

        // Credenciales para sesion
        $user = Auth::getProvider()->retrieveByCredentials($request->only('email', 'password'));
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Bienvenido ' . $user->name);
    }
}
