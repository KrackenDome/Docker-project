@extends('layout')
@section('content')
<head>
    <style>
        body {
            background-color: #fdea9b;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .navbar .nav-link {
            color: #333;
        }

        .nav-link{
            color: #000;
            margin: 0 10px;
            text-decoration: none;
        }

        .navbar .nav-link:hover {
            background-color: lightgray;
        }

        .has-text-centered {
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar py-0 navbar-expand-lg navbar-light navbar-laravel" role="navigation" aria-label="main navigation">
    <div class="container div2" id="navbarBasicExample navbar-menu">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            @endguest

        </div>
    </div>
</nav>
<h1 style="font-size: 110px; background-color: lightgray; opacity: 70%" class="has-text-centered">Welcome to my CRUD app</h1>
<section style="background-color: #e2e8f0; width: 700px; margin: 0 auto; margin-top: 90px">
    <p class="is-size-4 has-text-centered">This is a simple students CRUD that hopefully works</p>
</section>
</body>
@endsection
