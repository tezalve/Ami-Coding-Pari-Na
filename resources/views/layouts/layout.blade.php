<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>EP</title>
    </head>
    <body>
        <div class="navbar">
            <a href="{{ url('/')}}">Start Page</a>
        </div>
        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <div>
            @yield('content')
        </div>
    </body>
    @yield('script')
</html>