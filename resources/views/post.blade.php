@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>
        <h5>by {{ $post->author }} in {{ $post->category->name }}</h5>
        
        {!! $post->body !!}
        
    </article>

    <a href="/blog">Back to Posts</a>
@endsection