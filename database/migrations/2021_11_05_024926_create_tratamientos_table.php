<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha')->required();
            $table->string('descripcion')->required();

            //Foreing key Dientes
            $table->unsignedBigInteger('diente_id')->require();
            $table->foreign('diente_id')->references('id')->on('dientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
