@extends('layouts.app')
@section('title','Agregar nueva Respuesta')
@section('content')
@vite(['resources/js/respuestas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos de la respuesta</h1>
        <a href="{{route('respuesta.index')}}">Volver al listado de Preguntas y Respuestas</a>
        <hr>
        @include('respuesta.form')
    </div>
@endsection