@vite(['resources/js/relog.js'])
<form id="FRM_vf" class="form-horizontal" action="{{route('juego.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="tiempo" id="tiempo" value="{{$pregunta->tiempo}}">
    <input type="hidden" name="equipo" id="equipo" value="{{$equipo->id}}">
    <input type="hidden" name="duracion" id="duracion" value="">
    <input type="hidden" name="respuesta_id" id="respuesta_id" value="{{$pregunta->respuestas[0]->id}}">
    <input type="hidden" name="puntaje_id" id="puntaje_id" value="{{$pregunta->puntaje_id}}">
    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$pregunta->id}}">
    <input type="hidden" name="r_correcta" id="r_correcta" value="{{$pregunta->respuestas[0]->validez}}">
    <input type="hidden" name="validez" id="validez" value="0">
    <input type="hidden" name="puntos" id="puntos" value="{{$pregunta->puntaje->valor}}">
    <div class="input-group input-group-lg">
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Pregunta de&nbsp;<b>{{$pregunta->puntaje->nombre}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Valor:&nbsp;<b>{{$pregunta->puntaje->valor}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Tiempo para responder:&nbsp;<b>{{$pregunta->tiempo}}&nbsp;segundos</b></span>
        
    </div>
    <hr>
    <h4 class="text text-uppercase">Pregunta:&nbsp;<b>{{$pregunta->descripcion}}</b></h4>
    <hr>
    <center>
        <div class="row">
            <div class="col-md-3">
                @include('juego.relog')
            </div>
            <div class="col-md-3">
                <button type="button" id="start" class="btn btn-primary">Iniciar cuenta regresiva</button>
{{--                 <button type="button" id="pausa" class="btn btn-primary" disabled>pausar</button> --}}
            </div>
            <div class="col-md-6">
                <h1>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" id="opcion1" name="opcion" value="1">&nbsp;Verdadero
                        <label class="form-check-label" for="opcion1"></label>
                    </div>
                    <b>|&nbsp;</b>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" id="opcion2" name="opcion" value="0">&nbsp;Falso
                        <label class="form-check-label" for="opcion2"></label>
                    </div>
                </h1>
            </div>
        </div> 
    </center>
    <hr>
    <div id="resp" style="display: none">
        <h4 class="alert alert-dark text text-uppercase">Respuesta:&nbsp;<b>{{$pregunta->respuestas[0]->respuesta}}</b></h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1 id="mensaje" class=""></h1>
            </div>
        </div>
        <center><button type="submit" class="btn btn-success">Guardar y continuar</button></center>
    </div>
</form>