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
<label>Tiempo de duracion de la pregunta&nbsp;
    <select name="tiempo" id="tiempo" class="form-select">
        <option value="">Seleccione</option>
        @if(isset($tiempos))
            @foreach($tiempos as $tiempo)
                @if(isset($puntaje))
                {{$puntaje}}
                    @if(($tiempo->tiempo == $puntaje->tiempo) or ($tiempo->tiempo == old('tiempo')))
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
<hr>
<input type="hidden" id="activo" name="activo" value="0">
