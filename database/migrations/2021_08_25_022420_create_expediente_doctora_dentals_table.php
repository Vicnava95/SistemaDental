<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteDoctoraDentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_doctora_dentals', function (Blueprint $table) {
            $table->id()->autoIncrement();;
            $table->timestamps();

            //Foreign key
            $table->unsignedBigInteger('paciente_id')->unique();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });

        Schema::create('consulta_expedienteDoctora', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            //Foreign key
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');

            $table->unsignedBigInteger('expedienteDoctora_id');
            $table->foreign('expedienteDoctora_id')->references('id')->on('expediente_doctora_dentals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediente_doctora_dentals');
    }
}
