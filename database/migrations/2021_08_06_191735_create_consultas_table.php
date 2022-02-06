<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->require();
            $table->Date('fecha')->require();
            $table->double('peso')->nullable();
            $table->double('estatura')->nullable();
            $table->string('presion')->nullable();
            $table->double('temperatura')->nullable();
            $table->integer('frecuencia_cardiaca')->nullable();
            $table->integer('frecuencia_respiratoria')->nullable();
            $table->double('imc')->nullable();
            $table->string('solicitud_examen')->nullable();
            //llave foranea
            //paciente
            $table->unsignedBigInteger('paciente_id')->require();
            $table->foreign('paciente_id')
                    ->references('id')
                    ->on('pacientes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //persona
            $table->unsignedBigInteger('persona_id')->require();
            $table->foreign('persona_id')
                    ->references('id')
                    ->on('personas')
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
        Schema::dropIfExists('consultas');
    }
}
