
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BROLIK PMS') }}</title>

    <!-- Scripts -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/script.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    <style>

    </style>


    <script defer src="https://use.fontawesome.com/releases/v5.7.0/js/all.js" integrity="sha384-qD/MNBVMm3hVYCbRTSOW130+CWeRIKbpot9/gR1BHkd7sIct4QKhT1hOPd+2hO8K" crossorigin="anonymous"></script>

</head>
<body>
    <div id="main-cover">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                           <strong> {{ config('app.name', 'BROLIK PMS') }}</strong>
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
                                {{-- start device detection for navigatopn--}}


                                @if($agent->isDesktop())
                                <li class="nav-item">
                                    <a class="nav-link" href="/home"> {{ __('Dashboard') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('companies.index')}}"> {{ __('Companies') }}</a>
                                    </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('projects.index') }}"> {{ __('Projects') }}</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{ route('tasks.index') }}"> {{ __('Tasks') }}</a>
                                        </li>
                                    <li class="nav-item" id="notification_li">
                                            @include('layouts.notifications')

                                    </li>

                            @if (auth()->user()->role_id === 1)
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-user-circle"></i><span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right " role="menu" aria-labelledby="navbarDropdown">



                                        <li> <a class="dropdown-item" href="{{ route('projects.index') }}"><i class="fas fa-briefcase pr-2 text-muted"></i> &nbsp  Projects</a></li>
                                        <li><a class="dropdown-item" href="{{ route('tasks.index') }}"><i class="fas fa-tasks pr-2 text-muted"></i> &nbsp  Tasks</a> </li>
                                        <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-user-circle pr-2 text-muted"></i> &nbsp  Users</a></li>
                                        {{-- <li><a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fas fa-user-circle pr-2 text-muted"></i> &nbsp  Roles</a></li> --}}

                                    </ul>
                                </li>
                            @endif

                                <li class="nav-item ">

                                        <a class="nav-link"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         <i class="fas fa-sign-out-alt"></i>

                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                </li>
                                @elseif($agent->isTablet())

                                <li class="nav-item">
                                    <a class="nav-link" href="/home"> {{ __('Dashboard') }}</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('companies.index')}}"> {{ __('Companies') }}</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i></a>
                                        </li>
                                        <li class="nav-item" id="notification_li">
                                                @include('layouts.notifications')

                                        </li>
                            @if (auth()->user()->role_id === 1)
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-user-circle"></i><span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right " role="menu" aria-labelledby="navbarDropdown">



                                        <li> <a class="dropdown-item" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> </a></li>
                                        <li><a class="dropdown-item" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> </a> </li>
                                        <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-user-circle"></i> </a></li>
                                        <li><a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fas fa-user-circle"></i> </a></li>

                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item ">

                                    <a class="nav-link"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </li>
                                @else
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i></a>
                                            </li>
                                            <li class="nav-item" id="notification_li">
                                                    @include('layouts.notifications')

                                            </li>
                                @if (auth()->user()->role_id === 1)
                                <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fas fa-user-circle"></i><span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right " role="menu" aria-labelledby="navbarDropdown">


                                            <li ><a class="dropdown-item" href="{{ route('companies.index') }}"><i class="fas fa-building"></i></a></li>
                                            <li> <a class="dropdown-item" href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> </a></li>
                                            <li><a class="dropdown-item" href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> </a> </li>
                                            <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-user-circle"></i> </a></li>
                                            <li><a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fas fa-user-circle"></i> </a></li>

                                        </ul>
                                    </li>
                                @endif


                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fas fa-user-circle"></i><span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                             <i class="fas fa-sign-out-alt"></i>

                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endif
                                    {{-- end --}}
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

           <div id="app" >

            <div class="container-fluid">

            <main class="py-4">

                @include('partials.success')

                            @yield('content')



            </main>
        </div>
    </div>


</div>

<footer class="s-footer footer">
        <ul class="footer__social">
                <li><a href="https://github.com/arudovwen"><i class="fab fa-github" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/a_sucsex"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://instagram.com/sucsexxful"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://linkedin.com/im/success-ahon"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
               <div class="cl-copyright">
                    <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://linkedin.com/in/success-ahon" target="_blank">Success Ahon</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </span>
                  </div>
</footer>


</body>
</html>
