@extends('layouts.dashboard-layout')

@section('content')
    <div class="container">
        <h1 class="h1">My Links</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Original Link</th>
                    <th>Count</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($links as $link)

                    <tr>
                    <td>{{$link->id}}</td>
                    < <td>
                        <a href="{{ route('shorten.link', $link->code) }}"
                           target="_blank">{{ route('shorten.link', $link->code) }}</a>
                    </td>
                    <td><a href="{{$link->link}}">{{$link->link}}</a> </td>
                    <td>{{$link->count}}</td>
                    <td><a class="btn btn-danger" href="{{route('link.delete', ['id'=>$link->id])}}">Delete</a> </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
