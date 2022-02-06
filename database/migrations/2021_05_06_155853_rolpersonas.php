<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rolpersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolpersonas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('nombreRolPersona',50)->require();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rolpersonas');
    }
}
