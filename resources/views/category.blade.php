@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Category : {{ $category }}</h1>

    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            <h5>by <a href="#" class="text-decoration-none">{{ $post->author }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>

            <p>{{ $post->excerpt }}</p>

            <p><a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a></p>
        </article>
    @endforeach
@endsection
