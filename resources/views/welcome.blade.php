@extends('layouts.layout')
@section('content')
    <div>
        <h1>Start Page</h1>
        <a href="{{ route('login_view') }}">Login</a>
        <a href="{{ route('register_view') }}">Register</a>
        <a href="{{ url('api/user')}}">User</a>
        <a href="{{ url('api/logout')}}">Logout</a>
        <a href="{{ url('api/search') }}">Khoj the search</a>
        <a href="{{ url('api/getInp') }}">Get Input Values</a>
    </div>
@endsection
    