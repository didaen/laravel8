<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Dida En',
            'email' => 'allrised@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Yang Jungwon',
            'email' => 'yjw@gmail.com',
            'password' => bcrypt('123456')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Graphic Design',
            'slug' => 'graphic-design'
        ]);

        Category::create([
            'name' => 'Physics',
            'slug' => 'physics'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'category_id' => 1,
            'user_id' => 1,
            'slug' => 'judul-pertama',
            'excerpt' => 'Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque',
            'body' => '<p>Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque nesciunt incidunt reiciendis expedita necessitatibus doloribus qui magnam fugit iste enim! Nesciunt, reprehenderit aliquam dolore, totam harum architecto in recusandae numquam atque maxime doloremque culpa perferendis laudantium eligendi repudiandae sed assumenda explicabo voluptatum aliquid asperiores itaque omnis blanditiis. Illum dolor impedit iure praesentium, distinctio at dolorem debitis consectetur! Culpa, sapiente ea. Maiores.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, nihil? Repellat quae asperiores ipsam qui delectus dolore rerum, minus harum.</p>'
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'category_id' => 1,
            'user_id' => 1,
            'slug' => 'judul-kedua',
            'excerpt' => 'Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque',
            'body' => '<p>Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque nesciunt incidunt reiciendis expedita necessitatibus doloribus qui magnam fugit iste enim! Nesciunt, reprehenderit aliquam dolore, totam harum architecto in recusandae numquam atque maxime doloremque culpa perferendis laudantium eligendi repudiandae sed assumenda explicabo voluptatum aliquid asperiores itaque omnis blanditiis. Illum dolor impedit iure praesentium, distinctio at dolorem debitis consectetur! Culpa, sapiente ea. Maiores.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, nihil? Repellat quae asperiores ipsam qui delectus dolore rerum, minus harum.</p>'
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'category_id' => 3,
            'user_id' => 2,
            'slug' => 'judul-ketiga',
            'excerpt' => 'Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque',
            'body' => '<p>Omnis, non quia eum vitae minima nostrum dolorem, quasi cupiditate saepe adipisci cumque nesciunt incidunt reiciendis expedita necessitatibus doloribus qui magnam fugit iste enim! Nesciunt, reprehenderit aliquam dolore, totam harum architecto in recusandae numquam atque maxime doloremque culpa perferendis laudantium eligendi repudiandae sed assumenda explicabo voluptatum aliquid asperiores itaque omnis blanditiis. Illum dolor impedit iure praesentium, distinctio at dolorem debitis consectetur! Culpa, sapiente ea. Maiores.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, nihil? Repellat quae asperiores ipsam qui delectus dolore rerum, minus harum.</p>'
        ]);
    }
}
