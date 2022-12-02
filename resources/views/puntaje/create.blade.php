@extends('layouts.app')
@section('title','Agregar nueva Iglesia')
@section('content')
@vite(['resources/js/puntajes.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos de Puntaje</h1>
        <a href="{{route('puntaje.index')}}">Volver al listado de puntajes</a>
        <hr>
        <form id="nuevo_puntaje" action="{{route('puntaje.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            @include('puntaje.form')
            <br>
            <button type="submit" class="btn btn-success">Registrar Puntaje</button>
        </form>
    </div>
@endsection