@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">

            {{-- Menampilkan Flash Data Laravel dengan Component Dismissing Bootstrap --}}
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            @endif

            <main class="form-signin w-100 m-auto">
                <form action="/login" method="post">
                    @csrf
                    <img class="mb-4" src="../img/logopyabumuda.png" alt="Logo Physics Yourself" width="72" height="72">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>
                
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="name" placeholder="name@example.com" autofocus required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>

                <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!</a></small>
            </main> 

        </div>
    </div>
@endsection