<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        //jika berhasil jalankan ini
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //jika berhail redirect ke home / dashboard
            return redirect()->intended('/dashboard');
        }

        //jika gagal jalakan ini
        Session::flash('status','failed');
        Session::flash('pesan','Email Atau password salah');
        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}