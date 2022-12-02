@extends('layouts.app')
@section('title','Agregar nuevo Evento')
@section('content')
@vite(['resources/js/eventos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos del evento</h1>
        <a href="{{route('evento.index')}}">Volver al listado de Eventos</a>
        <hr>
        <form id="nuevo_evento" action="{{route('evento.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            @include('evento.form')
            <br>
            <button type="submit" class="btn btn-success">Registrar Evento</button>
        </form>
        <hr>
    </div>
@endsection