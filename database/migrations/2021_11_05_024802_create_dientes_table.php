<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDientesTable extends Migration
{
    public function up()
    {
        Schema::create('dientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('numeroDiente')->required();
            $table->string('nombreDiente')->required();
            
            //Expediente Doctora Dental
            $table->unsignedBigInteger('expedienteDental_id')->require();
            $table->foreign('expedienteDental_id')->references('id')->on('expediente_doctora_dentals');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dientes');
    }
}
