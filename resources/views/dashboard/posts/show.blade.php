@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            
                {{-- AWAL JUDUL POSTINGAN --}}
                <h1 class="mb-3">{{ $post->title }}</h1>
                {{-- AKHIR JUDUL POSTINGAN --}}

                <div class="mb-3">

                    {{-- AWAL TOMBOL BACK TO ALL MY POSTS --}}
                    <a href="/dashboard/posts" class="btn btn-success">
                        <span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts
                    </a>
                    {{-- AKHIR TOMBOL BACK TO ALL MY POSTS --}}
                     
                    {{-- AWAL TOMBOL EDIT --}}
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                        <span data-feather="edit" class="align-text-bottom"></span> Edit
                    </a>
                    {{-- AKHIR TOMBOL EDIT --}}

                    {{-- AWAL TOMBOL DELETE --}}
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this post?')"><span data-feather="x" class="align-text-bottom"></span> Delete</button>
                    </form>
                    {{-- AKHIR TOMBOL DELETE --}}

                </div>
                
                {{-- AWAL GAMBAR --}}
                @if ($post->image)
                    <div style="max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">  
                @endif
                {{-- AKHIR GAMBAR --}}

                {{-- AWAL BODY --}}
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                {{-- AKHIR BODY --}}

        </div>
    </div>
</div>
@endsection