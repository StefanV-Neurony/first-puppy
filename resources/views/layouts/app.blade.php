<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&family=Roboto:ital@0;1&display=swap" rel="stylesheet">



    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{request()->route()->getName()}}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-main shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('acasa') }}">
                    <img src="{{asset('images/first-puppy-logo.png')}}" class="logoUp" />{{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('acasa')}}">Acasă</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('animale')}}">Animale</a>
                        </li>
                        @auth
                        @if(auth()->user()->type === '0')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('utilizatori')}}">Utilizatori</a>
                        </li>
                                <li class="nav-item active">
                            <a class="nav-link" href="{{route('cereri')}}">Cereri</a>
                        </li>
                        @endif
                        @endauth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('cererile-mele')}}">Cererile mele</a>
                        </li>
                        @if(auth()->check() && auth()->user()->type === '0')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('cereri.rapoarte')}}">Rapoarte</a>
                        </li>
                        @endif
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('despre')}}">Despre noi</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('contact.create')}}">Contactează-ne</a>
                        </li>
                        @if(auth()->check() && auth()->user()->type === '0')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('contact.index')}}">Lista mesaje</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
