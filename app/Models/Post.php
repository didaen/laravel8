<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'author', 'excerpt', 'body'];
    protected $guarded = ['id'];

    // Menghubungkan dengan Model Category
    // Nama methodnya harus sama dengan nama modelnya
    public function category ()
    {
        // Dengan ini model Post sudah berelasi
        // dengan model Category
        return $this->belongsTo(Category::class);

        // Untuk pengecekan menggunakan Tinker
        // $post = Post::first()
        // $post->category
    }
}
