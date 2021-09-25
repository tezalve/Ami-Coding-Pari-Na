<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{asset('bootsrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootsrap/css/bootstrap-grid.min.css')}}">
        <title>Ami Coding Pari Na</title>
    </head>
    <style>
        .pad {
            padding: 20px !important;
        }
    </style>
    @yield('styles')
    <body>
        <div class="container">
            <header class="row">
                <div class="navbar">
                    <div class="navbar-inner">
                        <a href="{{ url('/')}}">Home Page</a>
                        <ul class="nav">
                            <li class="pad"><a href="{{ route('login_view') }}">Login </a></li>
                            <li class="pad"><a href="{{ route('register_view') }}">Register </a></li>
                            <li class="pad"><a href="{{ url('api/user')}}">User </a></li>
                            <li class="pad"><a href="{{ url('api/logout')}}">Logout </a></li>
                            <li class="pad"><a href="{{ url('api/search') }}">Khoj The Search </a></li>
                            <li class="pad"><a href="{{ url('api/getInp') }}">Get Input Values</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
            @endif

            <div id="main" class="row">

                @yield('content')

            </div>

            <footer class="row pad fixed-bottom">
                <div id="copyright text-right">© Copyright 2021 T.M.</div>
            </footer>
        </div>
    </body>
    @yield('script')
    <script>
        <script src="{{asset('bootsrap/js/bootstrap.min.js')}}"></script>
    </script>
</html>