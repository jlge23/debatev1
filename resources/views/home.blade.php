@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <h3>DEBATE es una pequeña aplicación Web construida con PHP y Laravel 9 Framework para realizar juegos de preguntas y respuestas por equipos. Version 1.0 beta</h3>
                    <h5><b>Pasos a seguir para configurar la aplicacion en su primer uso para el debate:</b>
                        <ul>
                            <li>Registrar las Iglesias o Lugares
                                @if($iglesias[0]->iglesia > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$iglesias[0]->iglesia}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('iglesia') }}">Iglesias</a>
                                @endif
                            </li>
                            <li>Registrar la Información del Evento
                                @if($eventos[0]->evento > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$eventos[0]->evento}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('evento') }}">Eventos</a>
                                @endif
                            </li>
                            <li>Registrar los equipos participantes
                                @if($equipos[0]->equipo > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$equipos[0]->equipo}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('equipo') }}">Equipos</a>
                                @endif
                            </li>
                            <li>Registrar la informacion de Puntajes para las preguntas
                                @if($puntajes[0]->puntaje > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$puntajes[0]->puntaje}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('puntaje') }}">Puntajes</a>
                                @endif
                            </li>
                            <li>Registrar las preguntas
                                @if($preguntas[0]->pregunta > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$preguntas[0]->pregunta}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('pregunta') }}">Preguntas</a>
                                @endif
                            </li>
                            <li>Registrar las Respuestas
                                @if($respuestas[0]->respuesta > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$respuestas[0]->respuesta}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;Falta.</b></label>&nbsp;<a class="btn btn-link" href="{{ url('respuesta') }}">Respuestas</a>
                                @endif
                            </li>
                            <li>Iniciar el Juego
                                @if($juegos[0]->juego > 0)
                                    <label class="text text-success"><b>&nbsp;Listo [{{$juegos[0]->juego}}]</b></label>
                                @else
                                    <label class="text text-danger"><b>&nbsp;No iniciado.</b></label>&nbsp;<b>NOTA:&nbsp;Deben cumplirse los pasos anteriores para inicar el juego</b>
                                @endif
                            </li>
                            <li>Ver informacion del Juego</li>
                        </ul>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
