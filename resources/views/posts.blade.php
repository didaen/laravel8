@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <h2>{{ $post["title"] }}</h2>
        <h5>Oleh : {{ $post["author"] }}</h5>
        <p>{{ $post["body"] }}</p>
    @endforeach
@endsection
