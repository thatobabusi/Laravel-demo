<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Demo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/responsive.bootstrap.min.css') }}">

    <!-- Javascript -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dataTables.responsive.min.js') }}"></script>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Demo
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('pages/about') }}">About Us</a></li>
                    @else
                        <li><a href="{{ url('/songs') }}">Songs</a></li>
                        <li><a href="{{ url('/users') }}">Users</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/users/'. Auth::user()->username) }}"><i class="fa fa-btn fa-pencil-square-o"></i> My Profile</a></li>
                                <li><a href="{{ url('/users/'. Auth::user()->username) . '/edit' }}"><i class="fa fa-btn fa-cogs"></i> Settings</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @include('flash::message')
    @yield('content')

    <!-- JavaScripts -->

    <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('js/loading-overlay.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('extra_js')
</body>
</html>
