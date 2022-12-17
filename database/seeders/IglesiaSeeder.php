<?php

namespace Database\Seeders;

use App\Models\Iglesia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IglesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //['nombre','descripcion'];
        Iglesia::create(['id' => 1,'nombre' => 'Emmaus Los Eucaliptos','descripcion' => 'Punta de Lanza']);
        Iglesia::create(['id' => 2,'nombre' => 'Emmaus Brisas de Oriente','descripcion' => 'Falta información 1']);
        Iglesia::create(['id' => 3,'nombre' => 'Emmaus El Cafetal','descripcion' => 'Falta información 2']);
    }
}
