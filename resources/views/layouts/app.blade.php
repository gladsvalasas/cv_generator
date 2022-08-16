<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    <img src="{{ asset("images/logo.png") }}">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                @if(Auth::check())
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route("home") }}">
                        Home
                    </a>

                    <a class="navbar-item" href="{{ route("landing.settings") }}">
                        {{ __("Landing Settings") }}
                    </a>
                </div>
                @endif

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            @guest
                                @if (Route::has('login'))
                                    <a class="button is-dark" href="{{ route('login') }}">
                                        <strong>{{ __('Login') }}</strong>
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                        <a class="button is-light" href="{{ route('register') }}">
                                            {{ __('Register') }}
                                        </a>
                                @endif
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <img data-src="{{ asset("storage/pictures/".Auth::user()->id."/avatar/".Auth::user()->photo_path) }}" class="nav-avatar lozad" alt="">
                                    <a class="navbar-link">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest


                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/'.Request::path().'.js') }}" defer></script>
</body>
</html>
