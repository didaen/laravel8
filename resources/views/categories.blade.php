@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card text-bg-dark">
                        <img src="..." class="card-img" alt="...">
                        <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($categories as $category)
        <ul>
            <li>
                <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
            </li>
        </ul>

    @endforeach
@endsection
