<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    //use HasFactory;
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = 'token';

    //Relacion 1:n - Equipos
    public function equipos(){
        return $this->hasMany(Equipo::class);
    }

     //Relacion 1:n - Eventos
     public function eventos(){
        return $this->hasMany(Evento::class);
    }
}