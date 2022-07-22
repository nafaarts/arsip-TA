<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function handleLogin()
    {
        //         "email": "nfalldh@gmail.com",
        // "password": "password",
        // "remember-me": "1"

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt(request(['email', 'password']), request('remember-me') == 1)) {
            return redirect('/login')->with('error', 'Password atau email salah');
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
