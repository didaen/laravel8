<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

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

        // Langkah pertama, memvalidasi data postingan sebelum disimpan ke database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
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
