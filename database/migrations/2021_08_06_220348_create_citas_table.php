<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha')->required();
            $table->time('hora', $precision = 0)->required();
            //llave foranea
            //paciente
            $table->unsignedBigInteger('paciente_id')->require();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            //persona
            $table->unsignedBigInteger('persona_id')->require();
            $table->foreign('persona_id')->references('id')->on('personas');
            //estadoCitas
            $table->unsignedBigInteger('estadoCita_id')->require();
            $table->foreign('estadoCita_id')->references('id')->on('estado_citas');

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
        Schema::dropIfExists('citas');
    }
}
