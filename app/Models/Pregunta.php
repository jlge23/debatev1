<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['descripcion','tiempo','puntaje_id','status'];
    //Relacion 1:n - Respuestas
    public function respuestas(){
        return $this->hasMany(Respuesta::class);
    }

    //Relacion 1:n inversa - Puntajes
    public function puntaje(){
        return $this->belongsTo(Puntaje::class);
    }
}
