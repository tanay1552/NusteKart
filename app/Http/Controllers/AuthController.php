<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect('/orders');
            }

            if (auth()->user()->role == 'vendor') {
                return redirect('/vendor');
            }

            if (auth()->user()->role == 'delivery') {
                return redirect('/delivery');
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}