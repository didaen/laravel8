<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Saat pengguna melakukan login
Route::post('/logout', [LoginController::class, 'logout']);

// Logout
Route::post('/login', [LoginController::class, 'authenticate']);

// REGISTER
// Saat pengguna menekan tombol register pada halama login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// Saat pengguna melakukan register
Route::post('/register', [RegisterController::class, 'store']);

// Setelah melakukan login pengguna akan diarahkan ke halaman ini
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// Route untuk FETCH pembuatan slug
// Route yang menuju method controller resource harus SEBELUM route controller resource
// Karena sudah nyoba nulis setelahnya dan FETCH nya gagal
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Membuat DashboardPostController
// Controller RESOURCE
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Controller Resource AdminCategoryController
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

