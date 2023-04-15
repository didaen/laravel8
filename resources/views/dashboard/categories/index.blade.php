@extends('dashboard.layouts.main')

@section('container')

    {{-- AWAL JUDUL HALAMAN --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>
    {{-- AKHIR JUDUL HALAMAN --}}
    
    {{-- AWAL PESAN FLASH --}}
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    {{-- AKHIR PESAN FLASH --}}
    
    <div class="table-responsive col-lg-6">
        {{-- AWAL TOMBOL Create new category --}}
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
        {{-- AKHIR TOMBOL Create new category --}}

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>

                    {{-- AWAL TOMBOL SHOW --}}
                    <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info">
                        <span data-feather="eye" class="align-text-bottom"></span>
                    </a>
                    {{-- AKHIR TOMBOL SHOW --}}
                    
                    {{-- AWAL TOMBOL EDIT --}}
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning">
                        <span data-feather="edit" class="align-text-bottom"></span>
                    </a>
                    {{-- AKHIR TOMBOL EDIT --}}

                    {{-- AWAL TOMBOL DELETE --}}
                    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete this post?')"><span data-feather="x" class="align-text-bottom"></span></button>
                    </form>
                    {{-- AKHIR TOMBOL DELETE --}}
                    
                    </a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection