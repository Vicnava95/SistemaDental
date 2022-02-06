<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->String('nombrePersonas',100)->require();
            $table->String('apellidoPersonas',100)->require();
            $table->String('dui',10)->nullable();
            $table->String('telefono',9)->require();
            $table->Date('fechaDeNacimiento')->require();
            $table->String('nitPersona',17)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('sexo_id')->require();
            $table->foreign('sexo_id')->references('id')->on('sexos');

            $table->unsignedBigInteger('rolpersona_id')->require();
            $table->foreign('rolpersona_id')->references('id')->on('rolpersonas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
