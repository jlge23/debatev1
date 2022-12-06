    <label>Seleccione la Pregunta:&nbsp;
        <select name="sel_pregunta" id="sel_pregunta" class="form-select selectpicker">
            <option value="">SELLECCIONE</option>
            @if(isset($preguntas) and count($preguntas) > 0)
                @foreach ($preguntas as $pregunta)
                    @if ($pregunta->id == old('sel_pregunta')) 
                        <option value="{{$pregunta->id}}" data-puntaje="{{$pregunta->puntaje->id}}" data-tiempo="{{$pregunta->tiempo}}" data-pnombre="{{$pregunta->puntaje->nombre}}" data-pvalor="{{$pregunta->puntaje->valor}}" data-pcomodin="{{$pregunta->puntaje->comodin}}" selected>{{$pregunta->descripcion." [".$pregunta->puntaje->nombre."]"}}</option>
                    @else
                        <option value="{{$pregunta->id}}" data-puntaje="{{$pregunta->puntaje->id}}" data-tiempo="{{$pregunta->tiempo}}" data-pnombre="{{$pregunta->puntaje->nombre}}" data-pvalor="{{$pregunta->puntaje->valor}}" data-pcomodin="{{$pregunta->puntaje->comodin}}">{{$pregunta->descripcion." [".$pregunta->puntaje->nombre."]"}}</option>
                    @endif
                @endforeach
            @else
                <option value="#" disabled>No se encuentran preguntas registradas</option>
            @endif
        </select>
    </label>&nbsp;
    @error('sel_pregunta')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
    @enderror
    <hr>
    <!-- Presentacion de formulario de respuesta, segun el tipo de pregunta -->
    <!-- Verdadero y falso -->
    <div id="vf" style="display: none;" data-div="P">
        <form id="verdad_falso" name="verdad_falso" action="{{route('respuesta.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            <input type="hidden" name="pregunta_id" id="pregunta_id">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12" id="pregunta"></div>
                    </div>
                    <label>Descripción de la respuesta:&nbsp;
                        <textarea name="respuesta" id="respuesta" class="form-control" rows="2" cols="50">{{$respuesta->respuesta ?? old('respuesta')}}</textarea>
                    </label>
                    @error('respuesta')
                        <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                    @enderror
                    <br>
                    <label>Validez de la respuesta:&nbsp;
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="validez1" name="validez" value="1">Verdadero
                            <label class="form-check-label" for="validez1"></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="validez2" name="validez" value="0">Falso
                            <label class="form-check-label" for="validez2"></label>
                        </div>
                    </label>
                    @error('status')
                    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
                    @enderror  
                </li>
            </ul>          
            <hr>
            <button type="submit" class="btn btn-success">Registrar Respuesta</button>
        </form>
    </div>
    <!-- Seleccion Simple -->
    <div id="simple" style="display: none;" data-div="P">
        <form id="seleccion_simple" name="seleccion_simple" action="{{route('respuesta.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            <input type="hidden" name="pregunta_id" id="pregunta_id">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12" id="pregunta"></div>
                    </div>
                    <hr>
                    <div class="row"><!-- Opcion 1-->
                        <div class="col-md-1"><b>Opción 1</b></div>
                        <div class="col-md-1"><label>Respuesta: </label></div>
                        <div class="col-md-10">
                                <textarea name="respuesta[]" id="respuesta1" class="form-control" rows="1" cols="50"></textarea>
                        </div>   
                        <hr>
                    </div>
                    <div class="row"><!-- Opcion 2-->
                        <div class="col-md-1"><b>Opción 2</b></div>
                        <div class="col-md-1"><label>Respuesta: </label></div>
                        <div class="col-md-10">
                                <textarea name="respuesta[]" id="respuesta2" class="form-control" rows="1" cols="50"></textarea>
                        </div>   
                        <hr>
                    </div>
                    <div class="row"><!-- Opcion 3-->
                        <div class="col-md-1"><b>Opción 3</b></div>
                        <div class="col-md-1"><label>Respuesta: </label></div>
                        <div class="col-md-10">
                                <textarea name="respuesta[]" id="respuesta3" class="form-control" rows="1" cols="50"></textarea>
                        </div>   
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><b>Respuesta Corecta:</b></div>
                        <div class="col-md-10">
                            <select name="validez" id="validez" class="form-select" required>
                                <option value="#">SELECCIONE</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                            </select>
                        </div>
                    </div>
                </li>
            </ul>
            <button type="submit" class="btn btn-success">Registrar Respuesta</button>
        </form>
    </div>
    <!-- Desarrollo -->
    <div id="des" style="display: none;" data-div="P">
        <form id="desarrollo" name="desarrollo" action="{{route('respuesta.store')}}" method="POST" class="form-horizontal">
            @csrf
            @method('POST')
            <input type="hidden" name="pregunta_id" id="pregunta_id">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12" id="pregunta"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-1"><label><b>Respuesta valida</b></label></div>
                        <div class="col-md-10">
                            <textarea name="respuesta" id="respuesta" class="form-control" rows="5" cols="50"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="validez" id="validez" value="1">
                    <hr>
                </li>
            </ul>
            <button type="submit" class="btn btn-success">Registrar Respuesta</button>
        </form>
    </div>


        {{-- <br>
        <label>Estado de la respuesta:&nbsp;
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status1" name="status" value="1" {{((isset($respuesta->status)) and $respuesta->status == "1") ? 'checked' : (old("status")  == "1" ? 'checked' : '')}}>Activa
                <label class="form-check-label" for="status1"></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status2" name="status" value="0" {{((isset($respuesta->status)) and $respuesta->status == "0") ? 'checked' : (old("status")  == "0" ? 'checked' : '')}}>Inactiva
                <label class="form-check-label" for="status2"></label>
            </div>
        </label>
        @error('status')
            <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
        @enderror
        <hr> --}}