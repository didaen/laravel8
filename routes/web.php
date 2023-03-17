<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;

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
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Dida EN",
        "email" => "den.elfsuju@gmail.com",
        "image" => "didaen.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// HALAMAN SINGLE POST
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route untuk menangani route /categories
Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all()
    ]);
});

// Route Model Binding untuk Category dan Post
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => 'Post Category : ' . $category->name,
        "active" => "categories",
        'posts' => $category->posts->load('category', 'author')
    ]);
});

// Route Model Binding untuk User dan Post
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => 'Post by ' . $author->name,
        "active" => "categories",
        'posts' => $author->posts->load('category', 'author')
    ]);
});


