<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // Untuk menangkap data menggunakan request
        // dd = dump or die
        // dd(request('search'));

        // Membuat perubahan untuk title halaman
        // sesuai dengan yang sedang dicari
        // Pada mulanya $title kosong
        $title = '';

        // Jika ada pengiriman data menggunakan URL dengan key 'category'
        if(request('category')) {
            // maka cari pada database model Category
            // yang pertama ditemukan dimana slug-nya sama dengan 
            // value yang dikirim melalui request('category')
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        // Jika ada pengiriman data menggunakan URL dengan key 'author'
        if(request('author')) {
            // maka cari pada database model User
            // yang pertama ditemukan dimana username-nya sama dengan 
            // value yang dikirim melalui request('author')
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }


        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "blog",
            // "posts" => Post::all()

            // Membuat data yang ditampilkan berdasarkan tanggal pembuatan
            // Yang paling terkini ditampilkan paling atas
            // "posts" => Post::latest()->get()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)

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
