<?php

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
    $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Dida EN",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet."
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Yang Jungwon",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet"
        ]
    ];
    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_post
    ]);
});