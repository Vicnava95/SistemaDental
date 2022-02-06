<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->required();
            $table->decimal('costo', $precision = 10, $scale = 2);
            $table->date('fecha')->required();
            $table->timestamps();

            //Foreing key
            $table->unsignedBigInteger('estado_pago_id');
            $table->foreign('estado_pago_id')
                    ->references('id')
                    ->on('estado_pagos')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('expediente_doctora_dental_id');
            $table->foreign('expediente_doctora_dental_id')
                    ->references('id')
                    ->on('expediente_doctora_dentals')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
