@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                
                    {{-- AWAL JUDUL HALAMAN --}}
                    <h1 class="mb-3">{{ $post->title }}</h1>
                    {{-- AKHIR JUDUL HALAMAN --}}

                    {{-- AWAL AUTHOR, CATEGORY, DAN WAKTU POSTINGAN --}}
                    <h5>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
                    {{-- AKHIR AUTHOR, CATEGORY, DAN WAKTU POSTINGAN --}}
                    
                    {{-- AWAL GAMBAR POSTINGAN --}}
                    @if ($post->image)
                        <div style="max-height: 400px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">  
                    @endif
                    {{-- AKHIR GAMBAR POSTINGAN --}}

                    {{-- AWAL BODY POSTINGAN --}}
                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                    {{-- AKHIR BODY POSTINGAN --}}

                    {{-- AWAL BACK TO POSTS--}}
                    <div class="d-block mt-3">
                        <a href="/posts">Back to Posts</a>
                    </div>
                    {{-- AKHIR BACK TO POSTS--}}
            </div>
        </div>
    </div>

@endsection