@vite(['resources/js/relog.js'])
<form id="FRM_desarrollo" class="form-horizontal" action="{{route('juego.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="tiempo" id="tiempo" value="{{$pregunta->tiempo}}">
    <input type="hidden" name="equipo" id="equipo" value="{{$equipo->id}}">
    <input type="hidden" name="duracion" id="duracion" value="">
    <input type="hidden" name="respuesta_id" id="respuesta_id" value="{{$pregunta->respuestas[0]->id}}">
    <input type="hidden" name="puntaje_id" id="puntaje_id" value="{{$pregunta->puntaje_id}}">
    <input type="hidden" name="pregunta_id" id="pregunta_id" value="{{$pregunta->id}}">
    <div class="input-group input-group-lg">
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Pregunta de&nbsp;<b>{{$pregunta->puntaje->nombre}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Valor:&nbsp;<b>{{$pregunta->puntaje->valor}}</b></span>
        <span class="input-group-text text text-uppercase" id="inputGroup-sizing-sm">Tiempo para responder:&nbsp;<b>{{$pregunta->tiempo}}&nbsp;segundos</b></span>
        
    </div>
    <hr>
    <h2 class="text text-uppercase">Pregunta:&nbsp;<b>{{$pregunta->descripcion}}</b></h2>
    <hr>
    <div class="row">
        <div class="col-md-4">
            @include('juego.relog')
        </div>
        <div class="col-md-4">
            <br>
            <center>
                <button type="button" id="start" class="btn btn-primary">Iniciar cuenta regresiva</button>&nbsp;&nbsp;
                <button type="button" id="stop" class="btn btn-warning" disabled>Detener cuenta regresiva</button>
            </center>
        </div>
        <div class="col-md-4">
                
        </div>
    </div>
    <hr>
    <div id="resp" style="display: none">
        <div class="row">
            <div class="col-md-2">
                <p align="center">
                    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#respuestacorrecta" aria-expanded="false" aria-controls="respuestacorrecta">Mostrar respuesta</button>
                </p>
            </div>
            <div class="col-md-10">
                <div>
                    <div class="collapse collapse-vertical" id="respuestacorrecta">
                        <div class="card card-body" style="width: 100%;">
                            <h2 class="alert alert-dark text text-uppercase">Respuesta:&nbsp;<b>{{$pregunta->respuestas[0]->respuesta}}</b></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <label id="punto" class="text text-dark"><b>Apreciacion:&nbsp;(0)</b></label>
            </div>
            <div class="col-md-10">
                <label class="sliderBar">  
                    <input type="range" class="form-control" min="0" max="{{$pregunta->puntaje->valor}}" step="1" id="opcion" name="opcion" value="0" list="puntajes">  
                    <datalist id="puntajes">
                    @for($i=0;$i<=$pregunta->puntaje->valor;$i++)
                        <option value={{$i}}>
                    @endfor
                    </datalist>
                </label>  
            </div>
        </div>
        <hr>
        <center><button type="submit" class="btn btn-success">Guardar y continuar</button></center>
    </div>
</form>