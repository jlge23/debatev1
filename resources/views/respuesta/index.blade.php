@extends('layouts.app')

@section('title','Datos de la Respuesta')
    
@vite(['resources/js/respuestas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Listado de Preguntas y Respuestas</h1>
        <hr>
        <a class="btn btn-dark" href="{{ url('/home') }}">Inicio</a>&nbsp;<a href="{{route('respuesta.create')}}" class="btn btn-primary">Registrar una Respuesta para un pregunta</a>
        <hr>
        <table id="respuesta" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Pregunta</th>
                    <th>Tipo</th>
                    <th>Respuesta</th>
                    <th>Validez</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($respuestas as $respuesta)
                <tr>
                    <td>{{$respuesta->id}}</td>
                    <td>{{$respuesta->pregunta->descripcion}}</td>
                    <td>{{$respuesta->pregunta->puntaje->nombre}}</td>
                    <td>{{$respuesta->respuesta}}</td>
                    <td>{{$respuesta->validez}}</label></td>
                    <td>{{$respuesta->status}}</td>
                   
                    <td>
                        <a href="{{route('respuesta.edit',$respuesta->pregunta_id)}}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{route('respuesta.destroy',$respuesta->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-warning">Eliminar</button>&nbsp;
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Pregunta</th>
                    <th>Tipo</th>
                    <th>Respuesta</th>
                    <th>Validez</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection