@extends('layouts.app')
@section('title','Editar datos de la Iglesia')
@section('content')
@vite(['resources/js/iglesias.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos de la Iglesia</h1>
        <a href="{{route('iglesia.index')}}">Volver al listado de Iglesias</a>
        <hr>
        <form id="editar_iglesia" action="{{route('iglesia.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
            @include('iglesia.form')
            <br>
            <input type="hidden" name="id" value="{{$iglesia->id}}">
            <button type="submit" class="btn btn-success">Actualizar datos</button>
        </form>
    </div>
@endsection