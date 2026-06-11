<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credential = [
            'user_name' => $request->user_name,
            'password' => $request->password
        ];

        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();

            session([
                'login_time' => now()
            ]);

            return redirect('/dashboard');
        }

        return back()->with(
            'error',
            'Login gagal'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}