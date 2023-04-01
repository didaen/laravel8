@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-registration w-100 m-auto">
                <form action="/register" method="post">
                    @csrf
                    <img class="mb-4" src="/img/logopyabumuda.png" alt="Logo Physics Yourself" width="72" height="72">
                    <h1 class="h3 mb-3 fw-normal">Registration</h1>
                
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>

                <small class="d-block text-center mt-3">Already have an account? <a href="/login">Login</a></small>
            </main> 

        </div>
    </div>
@endsection