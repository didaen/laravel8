@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <h5>by <a href="/user-{{ $post->user->id }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
        
        {!! $post->body !!}
        
    </article>

    <a href="/posts">Back to Posts</a>
@endsection