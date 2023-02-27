@extends('layouts.main')

@section('container')
    <h1 class="mb-5"> {{ $title }} </h1>

    {{-- IF MENGGUNAKAN BLADE --}}
    @if ($posts->count())
        <div class="card mb-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found</p>
    @endif
    {{-- END IF MENGGUNAKAN BLADE --}}


    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            <h5>by <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>

            <p>{{ $post->excerpt }}</p>

            <p><a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a></p>
        </article>
    @endforeach
@endsection
