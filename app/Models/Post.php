<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Dida EN",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yang Jungwon",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero, ipsam nihil odit nam temporibus voluptatem ad. Nobis, adipisci tenetur! Atque dolorem magni at sed voluptas maiores commodi suscipit fuga, voluptatum praesentium, dolor recusandae ullam aut similique culpa, unde cupiditate quaerat! Voluptatem quia dolore fugiat exercitationem et commodi delectus, ipsum quod laborum aperiam est, consectetur consequatur inventore sunt quos sequi magnam? Illum ipsum eaque provident incidunt dicta atque ipsa, quam dolore a. Nulla enim consequuntur sequi eveniet a fugit amet"
        ]
    ];

    
    public static function all()
    {
        return self::$blog_posts;
    }


    public static function find($slug)
    {
        $posts = self::$blog_posts;

        $new_post = [];

        foreach ($posts as $post) {
            if ($post["slug"] === $slug) {
                $new_post = $post;
            }
        }
    }
}
