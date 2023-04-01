<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        // Melakukan enkripsi password menggunakan bcrypt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // Melakukan enkripsi password menggunakan hashing yang sebenarnya juga menggunakan bcrypt
        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);

        
    }
}
