<?php

use App\Http\Controllers\DashboardController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// LOGIN
// Saat pengguna menekan link Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

// Saat pengguna melakukan login
Route::post('/logout', [LoginController::class, 'logout']);

// Logout
Route::post('/login', [LoginController::class, 'authenticate']);

// REGISTER
// Saat pengguna menekan tombol register pada halama login
Route::get('/register', [RegisterController::class, 'index']);

// Saat pengguna melakukan register
Route::post('/register', [RegisterController::class, 'store']);

// Setelah melakukan login pengguna akan diarahkan ke halaman ini
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


