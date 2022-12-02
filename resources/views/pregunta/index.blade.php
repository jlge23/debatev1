@extends('layouts.app')

@section('title','Datos de la Pregunta')
    
@vite(['resources/js/preguntas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Listado de Preguntas</h1>
        <hr>
        <a class="btn btn-dark" href="{{ url('/home') }}">Inicio</a>&nbsp;<a href="{{route('pregunta.create')}}" class="btn btn-primary">Registrar una Pregunta</a>
        <hr>
        <table id="pregunta" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Tiempo</th>
                    <th>Puntaje</th>
                    <th>Estatus</th>
                    <th>Respuesta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta->id}}</td>
                    <td>{{$pregunta->descripcion}}</td>
                    <td>{{$pregunta->tiempo}}</td>
                    <td>{{$pregunta->puntaje->nombre." - ".$pregunta->puntaje->valor}}</label></td>
                    <td>{{$pregunta->status}}</td>
                    <td>
                        <ul>
                        @foreach($pregunta->respuestas as $respuesta)
                            @if($respuesta->validez == 1)
                                <li>
                                    <label class="text text-success">
                                        
                                        <b>{{$respuesta->respuesta}}</b>
                                    </label>
                                </li>
                            @else
                                <li>
                                    <label class="text text-danger">{{$respuesta->respuesta}}</label>  
                                </li>
                            @endif                         
                        @endforeach
                        </ul>    
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            
                            <form action="{{route('pregunta.destroy',$pregunta->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('pregunta.edit',$pregunta->id)}}" class="btn btn-secondary">Editar</a>
                                <button type="submit" class="btn btn-warning">Eliminar</button>&nbsp;
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Tiempo</th>
                    <th>Puntaje</th>
                    <th>Estatus</th>
                    <th>Respuesta</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection