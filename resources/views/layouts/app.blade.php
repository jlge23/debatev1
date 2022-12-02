<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ env('app.name')}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                        <ul class="nav navbar-nav">
                        </ul>
                    @else
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/home') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('iglesia') }}">Iglesias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('evento') }}">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('equipo') }}">Equipos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('puntaje') }}">Puntajes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('pregunta') }}">Preguntas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('respuesta') }}">Respuesta</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('juego') }}">Juego</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('informe') }}">Informes</a></li>
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iglesias</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                <a href="{{route('iglesia.index')}}" class="dropdown-item">Listado</a>
                                <a href="{{route('iglesia.create')}}" class="dropdown-item">Nueva Iglesia</a>
                            </div>
                        </li>-->
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
