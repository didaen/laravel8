@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <h5>by <a href="/users/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
        
        {!! $post->body !!}
        
    </article>

    <div class="mt-3">
        <a href="/posts">Back to Posts</a>
    </div>
@endsection