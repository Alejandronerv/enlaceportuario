<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function validateLogin(Request $request)
    {
        // Aquí validarías los datos del usuario y los autenticarías
        // Por ahora, simplemente mostraremos los datos enviados

        $username = $request->username;
        $password = $request->password;
        $nameUser = $this->userService->getUserByUsername($username);

        // return view('dashboard', compact('username', 'password'));

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            // Store the user object
            Session::put('username', $username);
            Session::put('name', $nameUser->name);
            Session::put('type', $nameUser->type);
            Session::put('shipping_line', $nameUser->shipping_line);
            //////////////////////////////////////////////////////////////
            return redirect()->intended('/dashboard');
        } else {
            return back()->withErrors([
                'email' => 'Wrong credential, please try again.'
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('username');
        Session::forget('nameUser'); // Clear the user object from the session
        return redirect('/')->with('status', 'You have been logged out!');
    }


}
