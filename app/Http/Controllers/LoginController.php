<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // Jika user melakukan login
        if(Auth::attempt($credentials)) {

            // Regenerate lagi session untuk menghindari
            // Teknik hacking Session Fixation
            $request->session()->regenerate();

            // Menggunakan method intended() untuk memanfaatkan middleware
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login

        // Kita nanti akan masuk ke variabel error (@error) dan menampilkan pesan error yang kita buat sendiri
        // return back()->withErrors();

        // Kita juga dapat menggunakan flash data atau memanfaatkan session untuk menampilkan pesan error
        return back()->with('loginError', 'Login failed!');
    }

    // Method yang mengatur untuk logout
    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
