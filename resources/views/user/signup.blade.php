@extends('layouts.home-layout')
@section('content')
    <div class="container">
    <form action="" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating">
            <input type="text" name="name" class="form-control mb-2 text-dark" value="{{old('name')}}" id="name" placeholder="Your Name">
            <label for="name bg-light">Your name</label>
        </div>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <div class="form-floating">
            <input type="email" name="email" class="form-control mb-2" value="{{old('email')}}" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        @error('email')
        <p>{{$message}}</p>
        @enderror
        <div class="form-floating">
            <input type="password" class="form-control mb-2" id="password" placeholder="Password" name="password">
            <label for="password">Password</label>
        </div>
        @error('password')
        <p>{{$message}}</p>
        @enderror
        <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control mb-2" id="password_confirmation" placeholder="Password Confirmation">
            <label for="password_confirmation">Password Confirmation</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            </form>
    </div>

@endsection
