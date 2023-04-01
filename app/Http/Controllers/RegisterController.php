<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    // Method untuk menangani data pengguna yang register
    public function store(Request $request)
    {
        // Melakukan pengecekan terhadap data yang dikirim
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:25'
        ]);

        // Jika data yang dikiirmkan sudah benar atau lolos, maka jalankan

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        
    }
}
