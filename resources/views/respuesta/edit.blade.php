@extends('layouts.app')
@section('title','Editar datos del la Respuesta')
@section('content')
@vite(['resources/js/respuestas.js','resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    <div class="container">
        <h1>Editar datos de la respuesta</h1>
        {{$respuesta[0]->validez}}
        <a href="{{route('respuesta.index')}}">Volver al listado de Respuestas</a>
        <hr>
        <form id="editar_respuesta" action="{{route('respuesta.update')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
            <!-- Presentacion de formulario de respuesta, segun el tipo de pregunta -->
            <!-- Verdadero y falso -->
            <div id="vf_edit" style="display: {{$respuesta[0]->pregunta->puntaje_id == 1 ? 'block' : 'none'}};">
                <form id="vf_edit" name="vf_edit" action="{{route('respuesta.update')}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$respuesta[0]->pregunta_id}}">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label>Pregunta:&nbsp;
                                <textarea name="pregunta" id="pregunta" class="form-control" rows="1" cols="60" readonly="true">{{$respuesta[0]->pregunta->descripcion ?? old('pregunta')}}</textarea>
                            </label>
                            <hr>
                            <label>Descripción de la respuesta:&nbsp;
                                <textarea name="respuesta" id="respuesta" class="form-control" rows="2" cols="50">{{$respuesta[0]->respuesta ?? old('respuesta')}}</textarea>
                            </label>
                            @error('respuesta')
                                <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                            @enderror
                            <br>
                            <label>Validez de la respuesta:&nbsp;<b>{{$respuesta[0]->validez}}</b>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="validez1" name="validez" value="1" {{(($respuesta[0]->validez == '1' or old('validez') == '1') ? 'checked' : '')}}>Verdadero
                                    <label class="form-check-label" for="validez1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="validez2" name="validez" value="0" {{(($respuesta[0]->validez == 0 or old('validez') == 0) ? 'checked' : '')}}>Falso
                                    <label class="form-check-label" for="validez2"></label>
                                </div>
                            </label>
                            @error('status')
                            <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                            @enderror  
                        </li>
                    </ul> 
                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                <form>
            </div>
            <!-- Seleccion Simple -->
            <div id="simple_edit" style="display: {{$respuesta[0]->pregunta->puntaje_id == 2 ? 'block' : 'none'}};">
                <form id="simple_edit" name="simple_edit" action="{{route('respuesta.update')}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$respuesta[0]->pregunta_id}}">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label>Pregunta:&nbsp;
                                <textarea name="pregunta" id="pregunta" class="form-control" rows="1" cols="60" readonly="true">{{$respuesta[0]->pregunta->descripcion ?? old('pregunta')}}</textarea>
                            </label>
                            <hr>
                            @foreach($respuesta as $key=>$value)
                                <div class="row"><!-- Opcion 1-->
                                    <div class="col-md-1"><b>Opción {{$key+1}}</b></div>
                                    <div class="col-md-1"><label>Respuesta: </label></div>
                                    <div class="col-md-10">
                                            <textarea name="respuesta[]" id="respuesta{{$key+1}}" class="form-control" rows="1" cols="50">{{$value->respuesta}}</textarea>
                                    </div>   
                                    <hr>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-2"><b>Respuesta Corecta:</b></div>
                                <div class="col-md-10">
                                    <select name="validez" id="validez" class="form-select">
                                        <option value="#">SELECCIONE</option>
                                        <option value="1">Opción 1</option>
                                        <option value="2">Opción 2</option>
                                        <option value="3">Opción 3</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                <form>
            </div>
            <!-- Desarrollo -->
            <div id="des_edit" style="display: {{$respuesta[0]->pregunta->puntaje_id == 3 ? 'block' : 'none'}};">
                <form id="des_edit" name="des_edit" action="{{route('respuesta.update')}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$respuesta[0]->pregunta_id}}">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label>Pregunta:&nbsp;
                                <textarea name="pregunta" id="pregunta" class="form-control" rows="1" cols="60" readonly="true">{{$respuesta[0]->pregunta->descripcion ?? old('pregunta')}}</textarea>
                            </label>
                            <hr>
                            <label>Descripción de la respuesta:&nbsp;
                                <textarea name="respuesta" id="respuesta" class="form-control" rows="2" cols="50">{{$respuesta[0]->respuesta ?? old('respuesta')}}</textarea>
                            </label>
                            @error('respuesta')
                                <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                            @enderror
                            <br>
                            <label>Validez de la respuesta:&nbsp;
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="validez1" name="validez" value="1" {{$respuesta[0]->validez == 0 ? 'checked' : (old('respuesta') == 0 ? 'checked' : '')}}>Verdadero
                                    <label class="form-check-label" for="validez1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="validez2" name="validez" value="0" {{$respuesta[0]->validez == 0 ? 'checked' : (old('respuesta') == 0 ? 'checked' : '')}}>Falso
                                    <label class="form-check-label" for="validez2"></label>
                                </div>
                            </label>
                            @error('status')
                            <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                            @enderror  
                        </li>
                    </ul> 
                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                <form>
            </div>
            
            
        </form>

    </div> 
@endsection