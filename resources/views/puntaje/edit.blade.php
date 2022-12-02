@extends('layouts.app')
@section('title','Editar datos de la Iglesia')
@section('content')
@vite(['resources/js/puntajes.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos del Puntaje</h1>
        <a href="{{route('puntaje.index')}}">Volver al listado de Puntajes</a>
        <hr>
        <form id="editar_puntaje" action="{{route('puntaje.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
            @include('puntaje.form')
            <br>
            <input type="hidden" name="id" value="{{$puntaje->id}}">
            <button type="submit" class="btn btn-success">Actualizar datos</button>
        </form>
    </div>
@endsection