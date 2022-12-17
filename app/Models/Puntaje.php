<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntaje extends Model
{
    protected $fillable = ['id','nombre','tiempo','activo'];
    //Relacion 1:n - Preguntas
    public function Preguntas(){
        return $this->hasMany(Pregunta::class);
    }
}
