@vite(['resources/js/relog.js'])
<form id="FRM_vf" class="form-horizontal" action="{{route('juego.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="tiempo" id="tiempo" value="{{$pregunta[0]->puntaje->tiempo}}">
    <input type="hidden" name="equipo" id="equipo" value="{{$equipo->id}}">
    <input type="hidden" name="duracion" id="duracion" value="">
    <input type="hidden" name="puntaje_id" id="puntaje_id" value="{{$pregunta[0]->puntaje_id}}">
    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$pregunta[0]->id}}">
    <input type="hidden" name="validez" id="validez" value="0">
    <input type="hidden" name="puntos" id="puntos" value="{{$pregunta[0]->punto}}">
    <div class="input-group input-group-lg">
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Dificultad seleccionada de&nbsp;<b>{{$pregunta[0]->puntaje->nombre}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Valor:&nbsp;<b>{{$pregunta[0]->punto}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Tiempo para responder:&nbsp;<b>{{$pregunta[0]->puntaje->tiempo}}&nbsp;segundos</b></span>

    </div>
    <hr>
    <h2 class="text text-uppercase">Pregunta:&nbsp;<b>{{$pregunta[0]->pregunta}}</b></h2>
    <hr>
    <center>
        <div class="row">
            <div class="col-md-3">
                @include('juego.relog')
            </div>
            <div class="col-md-3">
                <button type="button" id="start1" class="btn btn-primary">Iniciar cuenta regresiva</button>

            </div>
            <div class="col-md-6">
                <button type="button" id="stop1" class="btn btn-warning" disabled>Detener cuenta regresiva</button>
            </div>
        </div>
    </center>
    <hr>
    <h1 id="OPT" style="display: none">
        <div class="form-check-inline">
            <input type="radio" class="form-check-input" id="opcion1" name="opcion" value="1">&nbsp;Correcto
            <label class="form-check-label" for="opcion1"></label>
        </div>
        <b>|&nbsp;</b>
        <div class="form-check-inline">
            <input type="radio" class="form-check-input" id="opcion2" name="opcion" value="0">&nbsp;Incorrecto
            <label class="form-check-label" for="opcion2"></label>
        </div>
    </h1>
    <hr>
    <div id="resp" style="display: none">
        <h2 class="alert alert-dark text text-uppercase">Respuesta:&nbsp;<b>{{$pregunta[0]->respuesta}}</b></h2>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h1 id="mensaje" class=""></h1>
            </div>
        </div>
        <center><button type="submit" class="btn btn-success">Guardar y continuar</button></center>
    </div>
</form>
