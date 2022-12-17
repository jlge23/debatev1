@extends('layouts.app')
@section('title','Datos del Juego')
@vite(['resources/js/juegos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    @isset($evento)
        @if(count($evento) == 0)
            <div class="container">
                <h1 class="alert alert-warning text text-dark">No hay eventos activos. Dirijase al menu <a href="evento">Eventos</a></h1>
            </div>
        @else
            @isset($preguntas)
                @if($preguntas == -1)
                    <div class="container">
                        <h1 class="alert alert-warning text text-dark">No se han encontrado preguntas registradas. Puede registrarlas aquí&nbsp;<a href='pregunta'>Modulo de preguntas</a></h1>
                    </div>
                @else
                    @if($preguntas == 0)
                        <div class="container">
                            <h1 class="alert alert-warning text text-dark">Se han agotado las preguntas. Puede registrar mas aquí:&nbsp;<a href='pregunta'>Modulo de preguntas</a> o, <a href='informe'>Ver resultados del Juego</a>
                            &nbsp;<button class="btn btn-danger" type="button" id="resetear" name="resetear">Reiniciar juego</button></h1>
                        </div>
                    @else
                        @if(isset($equipo))
                            <div class="container" id="inicio">
                                <div class="row border">
                                    <div class="col-md-6">
                                        <h5>Evento activo:&nbsp;<b>{{$evento[0]->nombre.". [".$evento[0]->descripcion."]"}}</b></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Turno:&nbsp;<b>Equipo [{{$equipo->id}}]&nbsp;-&nbsp;{{$equipo->nombre.". Iglesia: [".$equipo->iglesia->nombre."]"}}</h5>
                                    </div>
                                </div>
                                <div class="row border">
                                    @if(count($actual) > 0)
                                        <div class="col-md-8">
                                            <ul class="list-group list-group-horizontal-sm">
                                            @foreach($actual as $act)
                                                <li class="list-group-item">
                                                    {{$act->name.": [".$act->y."]"}}
                                                </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="col-md-8">
                                            <label class="text text-white bg-dark">Esperando que inicie el juego</label>
                                        </div>
                                    @endif
                                    <div class="col-md-2">
                                        <h4>
                                            <div class="form-check">
                                            </div>
                                        </h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>
                                            <button class="btn btn-warning" type="button" id="resetear" name="resetear">Reiniciar juego</button>
                                        </h4>
                                    </div>
                                </div>
                                <form action="" method="POST" class="form-control">
                                    @isset($equipo)
                                        <input type="hidden" name="equipo" id="equipo" value="{{$equipo->id}}" readonly>
                                    @endisset
                                    <div id="juego">
                                        <table id="DT_juego" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Tipo de pregunta</th>
                                                    <th>Tiempo en segundos</th>
                                                    <th>Preguntas disponibles</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Tipo de pregunta</th>
                                                    <th>Tiempo en segundos</th>
                                                    <th>Preguntas disponibles</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <!-- -->
                            <div class="modal fade" id="MD_Preguntas" aria-hidden="true" aria-labelledby="MD_PreguntasLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="MD_PreguntasLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="container-fluid">
                                        <center>
                                            <table class="table table-striped table-bordered table-hover" id="DT_preguntas" width="60%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Pregunta N°</th>
                                                        <th>Punto</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Pregunta N°</th>
                                                        <th>Punto</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </center>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @else
                            <div class="container">
                                <h1 class="alert alert-warning text text-dark">No se encuentran equipos registrados, puede registrarlos aqui:&nbsp;<a href='equipo'>Equipos</a>
                            </div>
                        @endif
                    @endif
                @endif
            @endisset
        @endif
    @endisset
@endsection
