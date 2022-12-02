@extends('layouts.app')
@section('title','Editar datos del equipo participante')
@section('content')
@vite(['resources/js/equipos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos del equipo participante</h1>
        <a href="{{route('equipo.index')}}">Volver al listado de los equipos participantes</a>
        <hr>
        <form id="editar_equipo" action="{{route('equipo.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            @include('equipo.form')
            <br>
            <input type="hidden" name="id" value="{{$equipo->id}}">
            <button type="submit" class="btn btn-success">Actualizar datos</button>
        </form>
    </div>
@endsection