<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function validateLogin(Request $request)
    {
        // Aquí validarías los datos del usuario y los autenticarías
        // Por ahora, simplemente mostraremos los datos enviados

        $username = $request->username;
        $password = $request->password;

        // return view('dashboard', compact('username', 'password'));

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        }
        else {
            return back()->withErrors([
                'email' => 'Wrong credential, please try again.'
            ]);
        }
}
}
