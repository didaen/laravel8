<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Dida EN",
        "email" => "den.elfsuju@gmail.com",
        "image" => "didaen.jpg"
    ]);
});

Route::get('/blog', function () {
    
    return view('posts', [
        "title" => "Blog",
        "posts" => Post::all()
    ]);
});

// HALAMAN SINGLE POST
Route::get('/posts/{slug}', function ($slug) {

    // $new_post = [];

    // foreach ($blog_posts as $post) {
    //     if ($post["slug"] === $slug) {
    //         $new_post = $post;
    //     }
    // }

    return view('post', [
        "title" => "Single Post",
        "post" => Post::find($slug)
    ]);
});