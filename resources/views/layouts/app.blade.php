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
                        @if(Auth::user()->name == 'Admin')
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
                            </ul>
                        @endif
                        @if(Auth::user()->name == 'Estadistica')
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a class="nav-link active" href="{{ url('/home') }}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('informe') }}">Informes</a></li>
                            </ul>
                        @endif
                        @if(Auth::user()->name == 'Juego')
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a class="nav-link active" href="{{ url('/home') }}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('juego') }}">Juego</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('informe') }}">Informes</a></li>
                            </ul>
                        @endif
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
        <div class="container-fluid">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc&nbsp;|&nbsp;Soporte en TIC.&nbsp;<a href="mailto:tic.emmaus@gmail.com">Contacto</a></p>
              <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              </a>
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="https://laravel.com" class="nav-link px-2 text-muted">Laravel</a></li>
                <li class="nav-item"><a href="https://mariadb.org" class="nav-link px-2 text-muted">MariaDB</a></li>
                <li class="nav-item"><a href="https://nodejs.org/es/" class="nav-link px-2 text-muted">NodeJS</a></li>
                <li class="nav-item"><a href="https://getcomposer.org" class="nav-link px-2 text-muted">Composer</a></li>
                <li class="nav-item"><a href="https://www.php.net/manual/es/intro-whatis.php" class="nav-link px-2 text-muted">PHP</a></li>
                <li class="nav-item"><a href="https://developer.mozilla.org/es/docs/Web/JavaScript" class="nav-link px-2 text-muted">javaScript</a></li>
              </ul>
            </footer>
        </div>
    </div>
</body>
</html>
