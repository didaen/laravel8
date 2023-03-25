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

        // Menggunakan when() dan null coalescing operator untuk mempersingkat
        // Jika ada pencarian (sesuatu yang ditulis pada kolom pencarian),
        $query->when($filters['search'] ?? false, function($query, $search) {
            // maka kembalikan querynya dengan kondisi
            return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
        });

        // MENGGUNAKAN JOIN TABLE
        // Jika pengguna mencari suatu postingan berdasarkan suatu category
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });
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
