@extends('layouts.app')
@section('title','Editar datos de la Juego')
@section('content')
@vite(['resources/js/juegos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
<body id="P">
    <div class="container-fluid">
        <h1 class="text text-dark">Jugando el equipo&nbsp;[{{$equipo->id}}]:&nbsp;<b>{{$equipo->nombre.". [".$equipo->iglesia->nombre."]"}}</b></h1>
        @switch($pregunta[0]->puntaje_id)
            @case(4)
                @include("juego.comodin")
            @break
            @default
                @include("juego.normal")
        @endswitch
    </div>
</body>
@endsection
