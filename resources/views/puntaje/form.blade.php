<label>Nombre:&nbsp;
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$puntaje->nombre ?? old('nombre')}}">
</label>
@error('nombre')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<hr>
<label>Tiempo de duracion de la pregunta&nbsp;
    <input type="text" name="tiempo" id="comodin" value="{{20 ?? old('comodin')}}" class="form-control" min="1" max="99">
</label>
@error('tiempo')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<hr>
<label>Estatus:&nbsp;
    <div class="form-check">
        <input type="radio" class="form-check-input" id="activo1" name="activo" value="1" {{((isset($puntaje->activo)) and $puntaje->activo == "1") ? 'checked' : (old("activo")  == "1" ? 'checked' : '')}}>Activo
        <label class="form-check-label" for="status1"></label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="activo2" name="activo" value="0" {{((isset($puntaje->activo)) and $puntaje->activo == "0") ? 'checked' : (old("activo")  == "0" ? 'checked' : '')}}>Inactivo
        <label class="form-check-label" for="status2"></label>
      </div>
</label>

@error('activo')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
