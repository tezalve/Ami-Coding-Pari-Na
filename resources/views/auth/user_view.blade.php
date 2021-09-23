@extends('layouts.layout')
@section('content')
    <div>
        <p>Name : {{$data->name}}</p>
        <p>Email : {{$data->email}}</p>
        <p>Created At: {{$data->created_at}}</p>
    </div>
@endsection