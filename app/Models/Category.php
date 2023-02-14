<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Method yang mengarah ke Post
    // Untuk menghubungkan tabel categories dengan posts
    // Nama methodnya harus sama dengan nama modelnya
    public function posts ()
    {
        // Relasi antara post dengan category apa
        // Category menitipkan foreignkey ke Post
        // Berarti pake has
        // Satu category bisa memiliki  banyak post
        return $this->hasMany(Post::class);
    }
}
