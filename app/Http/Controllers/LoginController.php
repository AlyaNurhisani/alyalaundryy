<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
            ]);

            if (Auth::attempt($credentials)){
                $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->route('a.home');
            }else if(Auth::user()->role == 'kasir'){
                return redirect()->route('k.home');
            }else if(Auth::user()->role == 'owner'){
                return redirect()->route('o.home');

            }
            return redirect()->intended( 'home');
        }

            return back()->withErrors([
                'email' => 'Username atau password salah.',

        ]);
    }

public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');

}

}
