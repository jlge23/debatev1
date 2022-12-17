<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**"tiempo": "45",
  "equipo": "2",
  "evento": "1",
  "duracion": "3.52",
  "respuesta_id": "1",
  "puntaje_id": "3",
  "validez": "6"
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('puntos')->default(0);
            $table->decimal('tiempo',10,2);
            $table->boolean('acierto');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('equipo_id')->references('id')->on('equipos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegos');
    }
};
