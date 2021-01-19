<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-gray-600 flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-6">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-6">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-6">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">

            @if(auth()->user())
{{--    Or: @auth()--}}
                <li>
                    <a href="#" class="p-6">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-6">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-6">Register</a>
                </li>
            @endif
        </ul>
    </nav>

    @yield('content')
{{--    this is kinda like <%- body %>  --}}
</body>
</html>
