<label>Dificiltad de la pregunta:&nbsp;
    <select name="puntaje_id" id="puntaje_id" class="form-select">
        <option value="">Seleccione</option>
        @if(isset($puntajes))
            @foreach ($puntajes as $puntaje)
                @if(isset($pregunta))
                    @if (($pregunta->puntaje_id == $puntaje->id) or ($pregunta->puntaje_id == old('puntaje_id')))
                        <option value="{{$puntaje->id}}" selected>{{$puntaje->nombre}}</option>
                    @else
                        <option value="{{$puntaje->id}}">{{$puntaje->nombre}}</option>
                    @endif
                @else
                    @if ($puntaje->id == old('puntaje_id'))
                        <option value="{{$puntaje->id}}" selected>{{$puntaje->nombre}}</option>
                    @else
                        <option value="{{$puntaje->id}}">{{$puntaje->nombre}}</option>
                    @endif
                @endif
            @endforeach
        @else
            <option value="#" disabled>No hay información de puntajes registrados</option>
        @endif
    </select>
</label>
@error('puntaje_id')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>

<label>Numero:&nbsp;
    <input type="number" name="numero" id="numero" class="form-control" min="1" max="99" value="{{$pregunta->numero ?? old('numero')}}" readonly>
</label>
@error('respuesta')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>

<label>Descripción de la Pregunta:&nbsp;
    <textarea name="pregunta" id="pregunta" class="form-control" rows="2" cols="50">{{$pregunta->pregunta ?? old('pregunta')}}</textarea>
</label>
@error('pregunta')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>

<label>Respuesta:&nbsp;
    <textarea name="respuesta" id="respuesta" class="form-control" rows="2" cols="50">{{$pregunta->respuesta ?? old('respuesta')}}</textarea>
</label>
@error('respuesta')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>

<label>Puntaje:&nbsp;
    <input type="number" name="punto" id="punto" class="form-control" min="1" max="99" value="{{$pregunta->punto ?? old('punto')}}">
</label>
@error('respuesta')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Estatus de la pregunta:&nbsp;
    <div class="form-check">
        <input type="radio" class="form-check-input" id="status1" name="status" value="1" {{((isset($pregunta->status)) and $pregunta->status == "1") ? 'checked' : (old("status")  == "1" ? 'checked' : '')}}>Activa
        <label class="form-check-label" for="status1"></label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="status2" name="status" value="0" {{((isset($pregunta->status)) and $pregunta->status == "0") ? 'checked' : (old("status")  == "0" ? 'checked' : '')}}>Inactiva
        <label class="form-check-label" for="status2"></label>
      </div>
</label>
@error('status')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
