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

Route::get('/posts', [PostController::class, 'index']);

// HALAMAN SINGLE POST
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route untuk menangani route /categories
Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

// Route Model Binding untuk Category dan Post
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});

// Route Model Binding untuk User dan Post
Route::get('/users/{user:username}', function (User $user) {
    return view('user', [
        'title' => $user->name,
        'posts' => $user->posts,
        'user' => $user->name
    ]);
});


