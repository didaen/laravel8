@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                
                    <h1 class="mb-3">{{ $post->title }}</h1>

                    <h5>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
                    
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>

                    <div class="d-block mt-3">
                        <a href="/posts">Back to Posts</a>
                    </div>
            </div>
        </div>
    </div>

@endsection