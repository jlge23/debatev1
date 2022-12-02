<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['pregunta_id','respuesta','validez','status'];
    //Relacion 1:n - Juegos
    public function juegos(){
        return $this->hasMany(Juego::class);
    }

    //Relacion 1:n inversa - Pregunta
    public function pregunta(){
        return $this->belongsTo(Pregunta::class);
    }
}
