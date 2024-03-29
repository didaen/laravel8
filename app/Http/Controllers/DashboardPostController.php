<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mencoba pengiriman postingan untuk pertama kali
        // return $request;

        // DUMP, DIE, AND DEBUG
        // Bagian bawah tidak akan dijalankan (die),
        // kita akan melakukan var_dump, sekaligus melakukan debug
        // ddd($request);

        // Untuk memanggil file yang dikirim harus melalui $request->file()
        // Tidak bisa lewat $request saja
        // Ingat ketika di-ddd() request dan files berada di tempat yang berbeda
        // file berupa image dan simpan di folder post-images (storage/app/post-images)
        // Fungsi di bawah ini mengembalikan PATH sekaligus menguploadnya
        // return $request->file('image')->store('post-images');

        // Langkah pertama, memvalidasi data postingan sebelum disimpan ke database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        // Gambar tidak wajib, karena jika pengguna tidak mengupload gambar
        // secara otomatis gambar akan diambil dari Unsplash
        // Gambar yg diupload akan melewati validasi dahulu
        // Jika pengguna mengupload gambar,
        if($request->file('image')) {

            // maka masukkan ke $validatedData['image'] dan simpan gambar ke folder 'post-images'
            $validatedData['image'] = $request->file('image')->store('post-images');
        };

        // user_id
        $validatedData['user_id'] = auth()->user()->id;

        // excerpt
        // ... adalah default makanya tidak perlu ditulis
        // strip_tags() punya PHP untuk menghilangkan semua tag html
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // Inset ke database
        Post::create($validatedData);

        // Kembalikan sambil menampilkan flash data
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        // Ketika pengguna melakukan update data, namun dengan slug yang sama, maka
        // Slug akan terseteksi tidak unique dan akan gagal mengupdate
        // Untuk itu perlu melakukan pengecekan slug tersendiri
        // Jika slug yang baru tidak sama dengan slug yang lama
        if($request->slug != $post->slug) {

            // maka buat aturan untuk slug
            $rules['slug'] = 'required|unique:posts';
        }

        // Lakukan validasi terhadap data dari $request dengan rules yang sudah dibuat
        $validatedData = $request->validate($rules);

        // Gambar tidak wajib, karena jika pengguna tidak mengupload gambar
        // secara otomatis gambar akan diambil dari Unsplash
        // Gambar yang belum divalidasi akan disimpan ke tempat penyimpanan sementara
        // Gambar yang telah divalidasi akan disimpan ke folder post-images
        // Jika pengguna mengupload gambar,
        if($request->file('image')) {

            // Jika gambar lamanya ada
            if($request->oldImage) {

                // Hapus gambar pada storage dengan nama tersebut
                Storage::delete($request->oldImage);
            }

            // maka masukkan ke $validatedData['image'] dan simpan gambar ke folder 'post-images'
            $validatedData['image'] = $request->file('image')->store('post-images');
        };

         // user_id
         $validatedData['user_id'] = auth()->user()->id;

         // excerpt
         // ... adalah default makanya tidak perlu ditulis
         // strip_tags() punya PHP untuk menghilangkan semua tag html
         $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
 
         // Inset ke database
         Post::where('id', $post->id)
             ->update($validatedData);
 
         // Kembalikan sambil menampilkan flash data
         return redirect('/dashboard/posts')->with('success', 'Post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Jika gambar lamanya ada
        if($post->image) {

            // Hapus gambar pada storage dengan nama tersebut
            Storage::delete($post->image);
        }

        // Dari URL yang dikirimkan adalah $post->slug
        // Kemudian dengan slug yang unique itu di dapat 1 row pada Model Post, tabel posts
        // 1 row itu kemudian kita dapat ambil apa saja, termasuk id-nya

        // Hapus postingan berdasarkan id-nya
        Post::destroy($post->id);

        // Kembalikan sambil menampilkan flash data
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted.');
    }

    // Method untuk mengirimkan data title untuk membuat slug
    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
        // return 'Selamat anda berhasil';
    }
}
