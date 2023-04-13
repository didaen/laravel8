@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            
                <h1 class="mb-3">{{ $post->title }}</h1>
                <div class="mb-3">
                    <a href="/dashboard/posts" class="btn btn-success">
                        <span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts
                    </a>
                    <a href="#" class="btn btn-warning">
                        <span data-feather="edit" class="align-text-bottom"></span> Edit
                    </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this post?')"><span data-feather="x" class="align-text-bottom"></span> Delete</button>
                        </form>
                </div>
                
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

        </div>
    </div>
</div>
@endsection