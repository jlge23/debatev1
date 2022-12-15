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
        Puntaje::create(['id' => 1, 'nombre' => 'Verdadero y Falso', 'valor' => 3, 'comodin' => 10, 'tiempo' => 10]);
        Puntaje::create(['id' => 2, 'nombre' => 'Selección Simple', 'valor' => 5, 'comodin' => 15, 'tiempo' => 15]);
        Puntaje::create(['id' => 3, 'nombre' => 'Desarrollo', 'valor' => 7, 'comodin' => 20, 'tiempo' => 30]);
    }
}
