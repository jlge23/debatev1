<label>Nombre:&nbsp;
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$iglesia->nombre ?? old('nombre')}}">
</label>
@error('nombre')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Descripción:&nbsp;
    <textarea name="descripcion" id="descripcion" class="form-control" rows="2" cols="50">{{$iglesia->descripcion ?? old('descripcion')}}</textarea>
</label>
@error('descripcion')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror