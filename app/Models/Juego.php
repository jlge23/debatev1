<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $fillable = ['fecha','puntos','seleccion','tiempo','acierto','equipo_id','evento_id','respuesta_id'];

    //Relacion 1:n inversa - Equipos
    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
    //Relacion 1:n inversa - Eventos
    public function evento(){
        return $this->belongsTo(Evento::class);
    }

    //Relacion 1:n inversa - Respuestas
    public function respuesta(){
        return $this->belongsTo(Respuesta::class);
    }
}
