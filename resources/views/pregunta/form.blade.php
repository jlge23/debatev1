<label>Descripción:&nbsp;
    <textarea name="descripcion" id="descripcion" class="form-control" rows="2" cols="50">{{$pregunta->descripcion ?? old('descripcion')}}</textarea>
</label>
@error('descripcion')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Tiempo de duracion de la pregunta&nbsp;
    <select name="tiempo" id="tiempo" class="form-select">
        <option value="">Seleccione</option>
        @if(isset($tiempos))
            @foreach($tiempos as $tiempo)
                @if(isset($pregunta))
                    @if(($tiempo->tiempo == $pregunta->tiempo) or ($tiempo->tiempo == old('tiempo')))
                        <option value="{{$tiempo->tiempo}}" selected>{{$tiempo->tiempo}}&nbsp;segundos</option>
                    @else
                        <option value="{{$tiempo->tiempo}}">{{$tiempo->tiempo}}&nbsp;segundos</option>
                    @endif
                @else
                    @if(($tiempo->tiempo == old('tiempo')))
                        <option value="{{$tiempo->tiempo}}" selected>{{$tiempo->tiempo}}&nbsp;segundos</option>
                    @else
                        <option value="{{$tiempo->tiempo}}">{{$tiempo->tiempo}}&nbsp;segundos</option>
                    @endif
                @endif
            @endforeach
        @endif
    </select>
</label>
@error('tiempo')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Puntaje de la pregunta:&nbsp;
    <select name="puntaje_id" id="puntaje_id" class="form-select">
        @if(isset($puntajes))
            @foreach ($puntajes as $puntaje)
                @if(isset($pregunta))
                    @if (($pregunta->puntaje_id == $puntaje->id) or ($puntaje->id == old('puntaje_id'))) 
                        <option value="{{$puntaje->id}}" selected>{{$puntaje->nombre." [".$puntaje->valor."]"}}</option>
                    @else
                        <option value="{{$puntaje->id}}">{{$puntaje->nombre." [".$puntaje->valor."]"}}</option>
                    @endif
                @else
                    @if ($puntaje->id == old('puntaje_id')) 
                        <option value="{{$puntaje->id}}" selected>{{$puntaje->nombre." [".$puntaje->valor."]"}}</option>
                    @else
                        <option value="{{$puntaje->id}}">{{$puntaje->nombre." [".$puntaje->valor."]"}}</option>
                    @endif
                @endif
            @endforeach
        @else
            <option value="#" disabled>No se encuentran puntajes o lugares registrados</option>
        @endif
    </select>
</label>&nbsp;
@error('puntaje_id')
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