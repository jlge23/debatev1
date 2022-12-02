@extends('layouts.app')
@section('title','Agregar nueva Pregunta')
@section('content')
@vite(['resources/js/preguntas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos de la pregunta</h1>
        <a href="{{route('pregunta.index')}}">Volver al listado de Preguntas</a>
        <hr>
        <form id="nueva_pregunta" action="{{route('pregunta.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            @include('pregunta.form')
            <br>
            <button type="submit" class="btn btn-success">Registrar Pregunta</button>
        </form>
        <hr>
    </div>
@endsection