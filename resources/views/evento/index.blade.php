@extends('layouts.app')

@section('title','Datos de la  Iglesia')
    
@vite(['resources/js/eventos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Listado de Eventos</h1>
        <hr>
        <a href="{{route('evento.create')}}" class="btn btn-primary">Registrar un Evento</a>
        <hr>
        <table id="eventos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha - Hora</th>
                    <th>Iglesia o lugar</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                <tr>
                    <td>{{$evento->id}}</td>
                    <td>{{$evento->nombre}}</td>
                    <td>{{$evento->descripcion}}</td>
                    <td>{{$evento->fecha}}</td>
                    <td>{{$evento->iglesia->nombre." - ".$evento->iglesia->descripcion}}</td>
                    <td>{{$evento->status}}</td>
                    <td>
                        <a href="{{route('evento.edit',$evento->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{route('evento.destroy',$evento->id)}}" method="POST">
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
                    <th>Descripción</th>
                    <th>Fecha - Hora</th>
                    <th>Iglesia o lugar</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection