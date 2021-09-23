@extends('layouts.layout')
@section('content')
    <div>
        <form method="POST" action="{{ url('api/login') }}" id="users_create_form">
            @php $form_type ='login' @endphp
            @include('auth/_form')
        </form>
    </div>