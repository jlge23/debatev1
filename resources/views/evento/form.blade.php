<label>Nombre:&nbsp;
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$evento->nombre ?? old('nombre')}}">
</label>
@error('nombre')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Descripción:&nbsp;
    <textarea name="descripcion" id="descripcion" class="form-control" rows="2" cols="50">{{$evento->descripcion ?? old('descripcion')}}</textarea>
</label>
@error('descripcion')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Fecha y hora: (Revisar, agregar libreria datepicker, campo tipo text)&nbsp;
    <input type="text" name="fecha" id="fecha" class="form-control" value="{{$evento->fecha ?? old('fecha')}}" min="{{date('Y-m-d')}}">
</label>
@error('fecha')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Iglesia o lugar de procedencia:&nbsp;
    <select name="iglesia_id" id="iglesia_id" class="form-select">
        @if(isset($iglesias))
            @foreach ($iglesias as $iglesia)
                @if(isset($evento))
                    @if (($evento->iglesia_id == $iglesia->id) or ($iglesia->id == old('iglesia_id'))) 
                        <option value="{{$iglesia->id}}" selected>{{$iglesia->nombre." - ".$iglesia->descripcion}}</option>
                    @else
                        <option value="{{$iglesia->id}}">{{$iglesia->nombre." - ".$iglesia->descripcion}}</option>
                    @endif
                @else
                    @if ($iglesia->id == old('iglesia_id')) 
                        <option value="{{$iglesia->id}}" selected>{{$iglesia->nombre." - ".$iglesia->descripcion}}</option>
                    @else
                        <option value="{{$iglesia->id}}">{{$iglesia->nombre." - ".$iglesia->descripcion}}</option>
                    @endif
                @endif
            @endforeach
        @else
            <option value="#" disabled>No se encuentran iglesias o lugares registrados</option>
        @endif
    </select>
</label>&nbsp;
@error('iglesia_id')
<br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Estatus del Evento:&nbsp;
    <div class="form-check">
        <input type="radio" class="form-check-input" id="status1" name="status" value="1" {{((isset($evento->status)) and $evento->status == "1") ? 'checked' : (old("status")  == "1" ? 'checked' : '')}}>Activo
        <label class="form-check-label" for="status1"></label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="status2" name="status" value="0" {{((isset($evento->status)) and $evento->status == "0") ? 'checked' : (old("status")  == "0" ? 'checked' : '')}}>Inactivo
        <label class="form-check-label" for="status2"></label>
      </div>
</label>
@error('status')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror