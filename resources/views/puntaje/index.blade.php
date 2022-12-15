@extends('layouts.app')

@section('title','Datos de Puntajes')

@vite(['resources/js/puntajes.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Listado de puntajes para preguntas</h1>
        <hr>
        <a class="btn btn-dark" href="{{ url('/home') }}">Inicio</a>&nbsp;<a href="{{route('puntaje.create')}}" class="btn btn-primary">Registrar un Puntaje</a>
        <hr>
        <table id="puntaje" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Comodin</th>
                    <th>Tiempos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntajes as $puntaje)
                <tr>
                    <td>{{$puntaje->id}}</td>
                    <td>{{$puntaje->nombre}}</td>
                    <td>{{$puntaje->valor}}</td>
                    <td>{{$puntaje->comodin}}</td>
                    <td>{{$puntaje->tiempo}}</td>
                    <td>
                        <a href="{{route('puntaje.edit',$puntaje->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{route('puntaje.destroy',$puntaje->id)}}" method="POST">
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
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Comodin</th>
                    <th>Tiempos</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
