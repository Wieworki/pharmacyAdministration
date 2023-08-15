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
            $table->smallInteger('es_medicamento')->default('0');
            $table->integer('tope_anual')->nullable();
            $table->integer('tope_mensual')->nullable();
            $table->smallInteger('recupero')->default('0');
            $table->smallInteger('cobertura_diabetes')->default('0');
            $table->smallInteger('cobertura_discapacidad')->default('0');
            $table->smallInteger('cobertura_anticonceptiva')->default('0');
            $table->smallInteger('cobertura_70')->default('0');
            $table->smallInteger('cobertura_oncologica')->default('0');
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
