@extends('layouts.app')
@section('title','Editar datos del la Pregunta')
@section('content')
@vite(['resources/js/preguntas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos de la pregunta</h1>
        <a href="{{route('pregunta.index')}}">Volver al listado de Preguntas</a>
        <hr>
        <form id="editar_pregunta" action="{{route('pregunta.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
            @include('pregunta.form')
            <br>
            <input type="hidden" name="id" value="{{$pregunta->id}}">
            <button type="submit" class="btn btn-success">Actualizar datos</button>
        </form>
    </div>
@endsection