<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //['nombre','descripcion','fecha','status','iglesia_id'];
        Evento::create(['id' => 1,'nombre' => 'Debate Bíblico Juvenil','descripcion' => '1era y 2da carta del Apostol Pablo a Timoteo','fecha' => '2022-12-17','status' => 1,'iglesia_id' => 1]);
    }
}
