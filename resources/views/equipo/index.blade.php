@extends('layouts.app')

@section('title','Datos de laos equipos participantes')
    
    @vite(['resources/js/app.js', 'resources/js/equipos.js'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Equipos Participantes</h1>
        <hr>
        <a class="btn btn-dark" href="{{ url('/home') }}">Inicio</a>&nbsp;<a href="{{route('equipo.create')}}" class="btn btn-primary">Registrar un nuevo equipo</a>
        <hr>
        <table id="equipo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Iglesia o lugar de procedencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                <tr>
                    <td>{{$equipo->id}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->iglesia->nombre}}</td>
                    <td>
                        <a href="{{route('equipo.edit',$equipo->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{route('equipo.destroy',$equipo->id)}}" method="POST">
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
                    <th>Iglesia o lugar de procedencia</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection