@extends('layouts.app')
@section('title','Agregar nueva Equipo')
@section('content')
@vite(['resources/js/equipos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos del equipo participante</h1>
        <a href="{{route('equipo.index')}}">Volver al listado de Equipos</a>
        <hr>
        <form id="nuevo_equipo" action="{{route('equipo.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            @include('equipo.form')
            <br>
            <button type="submit" class="btn btn-success">Registrar nuevo Equipo</button>
        </form>
        <hr>
    </div>
@endsection