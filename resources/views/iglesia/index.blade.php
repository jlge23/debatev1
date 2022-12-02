@extends('layouts.app')

@section('title','Datos de la  Iglesia')
    
@vite(['resources/js/iglesias.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
@section('content')
    <div class="container">
        <h1 class="alert alert-primary">Datos de las Iglesias</h1>
        <hr>
        <a href="{{route('iglesia.create')}}" class="btn btn-primary">Registrar una Iglesia</a>
        <hr>
        <table id="iglesia" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($iglesias as $iglesia)
                <tr>
                    <td>{{$iglesia->id}}</td>
                    <td>{{$iglesia->nombre}}</td>
                    <td>{{$iglesia->descripcion}}</td>
                    <td>
                        <a href="{{route('iglesia.edit',$iglesia->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{route('iglesia.destroy',$iglesia->id)}}" method="POST">
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
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection