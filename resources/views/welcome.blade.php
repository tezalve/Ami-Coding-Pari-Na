@extends('layouts.layout')
@section('content')
    <div>
        <h1>Start Page</h1>
        <a href="{{ route('login_view') }}">Login</a><br><br>
        <a href="{{ route('register_view') }}">Register</a><br><br>
        <a href="{{ url('api/user')}}">User</a><br><br>
        <a href="{{ url('api/logout')}}">Logout</a><br><br>
        <a href="{{ url('api/search') }}">Khoj the search</a><br><br>
        <a href="{{ url('api/getInp') }}">Get Input Values</a><br><br>
    </div>
@endsection
    