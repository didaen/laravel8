<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Untuk menangkap data menggunakan request
        // dd = dump or die
        // dd(request('search'));

        // Buat variabel untuk menangkap query dan urutkan dari yang paling baru
        $posts = Post::latest();

        // Jika ada pencarian (sesuatu yang ditulis pada kolom pencarian),
        if(request('search')) {
            // maka cari juga
            $posts->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            "title" => "All Posts",
            "active" => "blog",
            // "posts" => Post::all()

            // Membuat data yang ditampilkan berdasarkan tanggal pembuatan
            // Yang paling terkini ditampilkan paling atas
            // "posts" => Post::latest()->get()
            "posts" => $posts->get()

        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }
}
