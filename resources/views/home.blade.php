@extends('layouts.home-layout')
@section('content')
    <h1>URL SHORTNER</h1>
    <p class="lead">Shortner Your Links With Us</p>
    <form action="" method="post">
        @csrf
        <input type="text" class="lead form-control-file" name="link" id="link">
        <input type="submit" class="btn btn-primary mb-2" name="submit" value="OK">
        @error('link')
        <p>{{$message}}</p>
        @enderror
    </form>

    @if (Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
            <p><a href="/{{ Session::get('code') }}" target="_blank">{{\Illuminate\Support\Facades\URL::to('/'. Session::get('code'))}}</a> </p>
        </div>
    @endif

@endsection
