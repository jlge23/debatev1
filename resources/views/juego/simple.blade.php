@vite(['resources/js/relog.js'])
<form id="FRM_simple" class="form-horizontal" action="{{route('juego.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="tiempo" id="tiempo" value="{{$pregunta->tiempo}}">
    <input type="hidden" name="equipo" id="equipo" value="{{$equipo->id}}">
    <input type="hidden" name="duracion" id="duracion" value="">
    <input type="hidden" name="puntaje_id" id="puntaje_id" value="{{$pregunta->puntaje_id}}">
    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$pregunta->id}}">
    <input type="hidden" name="puntos" id="puntos" value="{{$pregunta->puntaje->valor}}">
    <input type="hidden" name="seleccion" id="seleccion" value="0">
    @foreach($pregunta->respuestas as $key=>$value)
        @if($value->validez == 1)
            <input type="hidden" name="respuesta_id" id="respuesta_id" value={{$value->id}}>
        @endif
    @endforeach
    <div class="input-group input-group-lg">
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Pregunta de&nbsp;<b>{{$pregunta->puntaje->nombre}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Valor:&nbsp;<b>{{$pregunta->puntaje->valor}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Tiempo para responder:&nbsp;<b>{{$pregunta->tiempo}}&nbsp;segundos</b></span>
    </div>
    <hr>
    <h2 class="text text-uppercase">Pregunta:&nbsp;<b>{{$pregunta->descripcion}}</b></h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <center><button type="button" id="start" class="btn btn-primary">Iniciar cuenta regresiva</button></center><hr>
            @include('juego.relog')
            <center><label>Seleccione una Opción:&nbsp;
                <select name="opcion" id="opcion" class="form-select">
                    <option value="0">SELECCIONE</option>
                    {{$i=1;}}
                    @foreach($pregunta->respuestas as $key=>$value)
                        <option value={{$value->id}}>OPCIÓN {{$i++}}</option>
                    @endforeach
                </select>
            </label></center>
        </div>
        <div class="col-md-7">
            @foreach($pregunta->respuestas as $key=>$value)
                <div class="row">
                    <div class="col-md-12"><b>Opción {{$key+1}}</b>&nbsp;
                        <textarea name="respuesta[]" id="respuesta" class="form-control" rows="2" cols="50" readonly>{{$value->respuesta}}</textarea>
                    </div>
                    <hr>
                </div>
            @endforeach                    
        </div>
    </div> 
    <div id="resp" style="display: none">
        @foreach($pregunta->respuestas as $key=>$value)
            @if($value->validez == 1)
                <h2 class="alert alert-dark text text-uppercase">Respuesta:&nbsp;<b>{{$value->respuesta}}</b></h2>
            @endif
        @endforeach
        
        <div class="row">
            <div class="col-md-12">
                <h1 id="mensaje" class=""></h1>
            </div>
        </div>
        <hr>
        <center><button type="submit" class="btn btn-success">Guardar y continuar</button></center>
    </div>
</form>