<label>Nombre:&nbsp;
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$equipo->nombre ?? old('nombre')}}">
</label>
@error('nombre')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Iglesia o lugar de procedencia:&nbsp;
    <select name="iglesia_id" id="iglesia_id" class="form-select">
        @if(isset($iglesias))
            @foreach ($iglesias as $iglesia)
                @if(isset($equipo))
                    @if (($equipo->iglesia_id == $iglesia->id) or ($iglesia->id == old('iglesia_id'))) 
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