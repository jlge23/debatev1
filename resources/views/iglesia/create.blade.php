@extends('layouts.app')
@section('title','Agregar nueva Iglesia')
@section('content')
@vite(['resources/js/iglesias.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Registrar datos de la Iglesia</h1>
        <a href="{{route('iglesia.index')}}">Volver al listado de Iglesias</a>
        <hr>
        <form id="nueva_iglesia" action="{{route('iglesia.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            @include('iglesia.form')
            <br>
            <button type="submit" class="btn btn-success">Registrar Iglesia</button>
        </form>
        <hr>
    </div>
@endsection