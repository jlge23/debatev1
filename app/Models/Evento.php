<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre','descripcion','fecha','status','iglesia_id'];
    //Relacion 1:n - Juegos
    public function juegos(){
        return $this->hasMany(Juego::class);
    }

    //Relacion 1:n inversa - Iglesias
    public function iglesia(){
        return $this->belongsTo(Iglesia::class);
    }
}
