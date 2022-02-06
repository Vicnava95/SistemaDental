<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->String('descripcion')->required();
            $table->Date('fecha')->required();
            $table->Date('proximaCita')->nullable();
            //llave foranea
            //consulta
            $table->unsignedBigInteger('consulta_id')->require();
            $table->foreign('consulta_id')
                    ->references('id')
                    ->on('consultas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //estadoReceta
            $table->unsignedBigInteger('estadoReceta_id')->require();
            $table->foreign('estadoReceta_id')->references('id')->on('estado_recetas');

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
        Schema::dropIfExists('recetas');
    }
}
