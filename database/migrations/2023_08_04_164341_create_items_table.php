<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->smallInteger('es_medicamento');
            $table->integer('tope_anual');
            $table->integer('tope_mensual');
            $table->smallInteger('recupero');
            $table->smallInteger('cobertura_diabetes');
            $table->smallInteger('cobertura_discapacidad');
            $table->smallInteger('cobertura_anticonceptiva');
            $table->smallInteger('cobertura_70');
            $table->smallInteger('cobertura_oncologica');
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
        Schema::dropIfExists('items');
    }
};
