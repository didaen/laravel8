<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'author', 'excerpt', 'body'];
    protected $guarded = ['id'];

    // Menambahkan property untuk mempermudah melaukan LAZY LOADING
    // Method with() Lazy Loading
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        // Jika ada pencarian (sesuatu yang ditulis pada kolom pencarian),
        if(isset($filters['search']) ? $filters['search'] : false) {
            // maka kembalikan querynya dengan kondisi
            return $query->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }
    }

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

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
