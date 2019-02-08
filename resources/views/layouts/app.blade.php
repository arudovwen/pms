<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BROLIK PMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>

       </style>


    <script defer src="https://use.fontawesome.com/releases/v5.7.0/js/all.js" integrity="sha384-qD/MNBVMm3hVYCbRTSOW130+CWeRIKbpot9/gR1BHkd7sIct4QKhT1hOPd+2hO8K" crossorigin="anonymous"></script>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'BROLIK PMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }} <i class="fas fa-sign-in-alt"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} <i class="fas fa-plus-circle"></i></a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i> {{ __('My Companies ') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> {{ __('Projects') }}</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> {{ __('Tasks') }}</a>
                                    </li>

                        @if (auth()->user()->role_id === 1)
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user-circle"></i>&nbsp Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right " role="menu" aria-labelledby="navbarDropdown">


        <li ><a class="dropdown-item" href="{{ route('companies.index') }}"><i class="fas fa-building"></i> &nbsp All Companies</a></li>
        <li> <a class="dropdown-item" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> &nbsp All Projects</a></li>
        <li><a class="dropdown-item" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> &nbsp All Tasks</a> </li>
        <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-user-circle"></i> &nbsp All Users</a></li>
        <li><a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fas fa-user-circle"></i> &nbsp All Roles</a></li>

                                </ul>
                            </li>
                        @endif


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user-circle"></i>&nbsp {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">

        <main class="py-4">

            @include('partials.success')

                        @yield('content')



        </main>
    </div>
</div>
    <footer class="footer">
     <div>
            <a href='https://www.linkedin.com/in/success-ahon/'><i class="fab fa-linkedin"></i></a> &nbsp;&nbsp;
            <a href='https://github.com/arudovwen'> <i class="fab fa-github-square"></i></a>&nbsp;&nbsp;
            <a href='https://mobile.twitter.com/A_Sucsex'><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;
            <a href='https://www.instagram.com/sucsexxful'><i class="fab fa-instagram"></i></a>
              <p> <small>All rights reserved  copyright @2019</small></p>
     </div>
    </footer>

</body>
</html>
