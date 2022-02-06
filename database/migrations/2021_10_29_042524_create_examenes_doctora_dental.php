<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesDoctoraDental extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_doctora_dentals', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->date('fecha')->required();
            $table->string('descripcion')->required();

            //Foreing key
            $table->unsignedBigInteger('expediente_doctora_dental_id');
            $table->foreign('expediente_doctora_dental_id')
                    ->references('id')
                    ->on('expediente_doctora_dentals')
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
        Schema::dropIfExists('examenes_doctora_dentals');
    }
}
