<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

#login page
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login')->with([
            'errors' => session('errors') ?? new \Illuminate\Support\ViewErrorBag(),
            'old' => session('old') ?? []
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    
}


