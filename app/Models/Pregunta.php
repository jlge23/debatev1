<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['id','numero','punto','pregunta','respuesta','puntaje_id','status'];
    //Relacion 1:n - Respuestas
    public function juegos(){
        return $this->hasMany(Juego::class);
    }

    //Relacion 1:n inversa - Puntajes
    public function puntaje(){
        return $this->belongsTo(Puntaje::class);
    }
}
