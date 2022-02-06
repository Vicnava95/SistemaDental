<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasDentalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas_dentales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('descripcion')->nullable();
            $table->Date('fecha')->required();
            $table->Date('proximaCita')->nullable();
            //llave foranea
            //ExpedienteDental
            $table->unsignedBigInteger('expedienteDental_id')->require();
            $table->foreign('expedienteDental_id')
                    ->references('id')
                    ->on('expediente_doctora_dentals')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //Estado Receta
            $table->unsignedBigInteger('estadoReceta_id')->require();
            $table->foreign('estadoReceta_id')->references('id')->on('estado_recetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas_dentales');
    }
}
