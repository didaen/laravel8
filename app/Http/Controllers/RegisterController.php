<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Menangkap semua data yang dikirim dan menampilkan
        return $request->all();
    }
}
