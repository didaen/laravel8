@extends('layouts.main')

@section('container')

    {{-- AWAL JUDUL HALAMAN --}}
    <h1 class="mb-3 text-center"> {{ $title }} </h1>
    {{-- AKHIR JUDUL HALAMAN --}}


    <div class="row justify-content-center mb-3">
        <div class="col-md-6">

            {{-- AWAL FORM SEARCH --}}
            <form action="/posts">

                {{-- MENGGABUNGKAN FILTER CATEGORY DENGAN SEARCH --}}
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            {{-- AKHIR FORM SEARCH --}}

        </div>
    </div>


    {{-- IF MENGGUNAKAN BLADE UNTUK MENGECEK ADA POSTINGAN ATAU TIDAK --}}
    @if ($posts->count())

        <div class="card mb-3">

            {{-- AWAL GAMBAR HERO --}}
            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            {{-- AKHIR GAMBAR HERO --}}

            <div class="card-body text-center">

                {{-- AWAL JUDUL POSTINGAN HERO --}}
                <h3 class="card-title">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h3>
                {{-- AWAL JUDUL POSTINGAN HERO --}}

                {{-- AWAL AUTHOR, CATEGORY, DAN WAKTU POSTINGAN HERO --}}
                <p>
                    <small class="text-muted">
                        by <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                {{-- AKHIR AUTHOR, CATEGORY, DAN WAKTU POSTINGAN HERO --}}

                {{-- AWAL EXCERPT POSTINGAN HERO --}}
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                {{-- AKHIR EXCERPT POSTINGAN HERO --}}

                {{-- AWAL READ MORE POSTINGAN HERO --}}
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                {{-- AKHIR READ MORE POSTINGAN HERO --}}

            </div>
        </div>

    <div class="container">
        <div class="row">

            {{-- Foreach mau mencetak semua kecuali postingan yang pertama --}}
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">

                        {{-- AWAL CATEGORY POSTINGAN CARD --}}
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        {{-- AKHIR CATEGORY POSTINGAN CARD --}}

                        {{-- AWAL GAMBAR POSTINGAN CARD --}}
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif
                        {{-- AKHIR GAMBAR POSTINGAN CARD --}}

                        <div class="card-body">

                            {{-- AWAL JUDUL POSTINGAN CARD --}}
                            <h5 class="card-title">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>
                            {{-- AKHIR JUDUL POSTINGAN CARD --}}

                            {{-- AWAL AUTHOR DAN CATEGORY POSTINGAN CARD --}}
                            <p>
                                <small class="text-muted">
                                    by <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            {{-- AKHIR AUTHOR DAN CATEGORY POSTINGAN CARD --}}

                            {{-- AWAL EXCERPT POSTINGAN CARD --}}
                            <p class="card-text">
                                {{ $post->excerpt }}
                            </p>
                            {{-- AKHIR EXCERPT POSTINGAN CARD --}}

                            {{-- AWAL READ MORE POSTINGAN CARD --}}
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
                            {{-- AKHIR READ MORE POSTINGAN CARD --}}

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found</p>
    @endif
    {{-- END IF MENGGUNAKAN BLADE --}}

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

@endsection
