@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            
                <h1 class="mb-3">{{ $post->title }}</h1>
                <div class="mb-3">
                    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>
                    <a href="#" class="btn btn-warning">
                        <span data-feather="edit" class="align-text-bottom"></span> Edit
                    </a>
                    <a href="#" class="btn btn-danger">
                        <span data-feather="x" class="align-text-bottom"></span> Delete
                    </a>
                </div>
                
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