@extends('layouts.app')
@section('title','Agregar nueva Iglesia')
@vite(['resources/js/informes.js','resources/js/graficos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    @isset($evento)
        @if(count($evento) == 0)
            <div class="container">
                <h1 class="alert alert-warning text text-dark">No hay eventos activos. Dirijase al menu <a href="evento">Eventos</a></h1>
            </div>
        @else
            <div class="container-fluid border">
                <div class="row border">
                    <div class="col">   
                        <div class="row">
                            <div class="col">
                                <figure class="highcharts-figure">
                                    <div id="container4"></div>
                                    <p class="highcharts-description">
                                        Porcentaje de avance del Juego, las preguntas activas al 100% representan el juego en su inicio.
                                    </p>
                                </figure>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col">
                                <figure class="highcharts-figure">
                                    <div id="container2"></div>
                                    <p class="highcharts-description">
                                        Porcentaje en puntaje alcanzado por equipos
                                    </p>
                                </figure>
                            </div>    
                        </div>                   
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <figure class="highcharts-figure">
                                    <div id="container1"></div>
                                    <p class="highcharts-description">
                                        Puntaje alcanzado por equipo.
                                    </p>
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <figure class="highcharts-figure">
                                    <div id="container3"></div>
                                    <p class="highcharts-description">
                                        Este grafico muestra el tiempo consumido por equipo al responder sus respectivas preguntas en su turno.
                                    </p>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        {{-- <div class="container-fluid" id="info">
            <div class="row">
                <div class="col-md-8">
                    <div class="input-group input-group">
                        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Evento activo:&nbsp;<b>{{$evento[0]->nombre.". [".$evento[0]->descripcion."]"}}</b></span>
                        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Fecha:&nbsp;<b>{{$evento[0]->fecha}}</b>&nbsp;|&nbsp;Lugar:&nbsp;<b>{{$evento[0]->iglesia->nombre}}</b></span>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container1"></div>
                        <p class="highcharts-description">
                            Chart showing column comparisons with negative values.
                            Column charts are commonly used to compare values, and remains one of
                            the most popular and readable types of charts.
                        </p>
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="highcharts-figure">
                        <div id="container2"></div>
                        <p class="highcharts-description">
                            Pie charts are very popular for showing a compact overview of a
                            composition or comparison. While they can be harder to read than
                            column charts, they remain a popular choice for small datasets.
                        </p>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div> --}}
        @endif
    @endisset
@endsection