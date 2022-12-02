@extends('layouts.app')
@section('title','Editar datos del Evento')
@section('content')
@vite(['resources/js/eventos.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos del evento</h1>
        <a href="{{route('evento.index')}}">Volver al listado de Eventos</a>
        <hr>
        <form id="editar_evento" action="{{route('evento.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
            @include('evento.form')
            <br>
            <input type="hidden" name="id" value="{{$evento->id}}">
            <button type="submit" class="btn btn-success">Actualizar datos</button>
        </form>
    </div>
@endsection