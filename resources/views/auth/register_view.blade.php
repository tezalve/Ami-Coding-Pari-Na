@extends('layouts.layout')
@section('content')
    <form method="POST" action="{{ url('api/register') }}" id="users_create_form">
        @php $form_type ='register' @endphp
        @include('auth/_form')
    </form>
@endsection