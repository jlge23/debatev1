<label>Nombre:&nbsp;
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$puntaje->nombre ?? old('nombre')}}">
</label>
@error('nombre')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Ponderacion:&nbsp;
    <input type="number" name="valor" id="valor" value="{{$puntaje->valor ?? old('valor')}}" class="form-control" min="1" max="99">
</label>
@error('valor')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<br>
<label>Ponderacion del comodin:&nbsp;
    <input type="number" name="comodin" id="comodin" value="{{$puntaje->comodin ?? old('comodin')}}" class="form-control" min="1" max="99">
</label>
@error('comodin')
    <br><small class="text text-danger">*&nbsp;{{$message}}</small><br>
@enderror
<hr>