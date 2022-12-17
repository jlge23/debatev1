<?php

namespace Database\Seeders;

use App\Models\Puntaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuntajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puntaje::create(['id' => 1,'nombre' => 'FÁCIL','tiempo' => 20,'activo' => 1]);
        Puntaje::create(['id' => 2,'nombre' => 'MODERADA','tiempo' => 20,'activo' => 1]);
        Puntaje::create(['id' => 3,'nombre' => 'DIFICIL','tiempo' => 20,'activo' => 1]);
        Puntaje::create(['id' => 4,'nombre' => 'COMIDIN','tiempo' => 20,'activo' => 0]);
    }
}

