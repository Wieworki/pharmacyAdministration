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
        Schema::create('pedido_farmacias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('afiliado_id');
            $table->text('nombre_afiliado');
            $table->text('dni_afiliado');
            $table->date('fecha_validez');
            $table->date('fecha_recepcion');
            $table->text('patologia');
            $table->text('medico');
            $table->bigInteger('estado_id');
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
        Schema::dropIfExists('pedido_farmacias');
    }
};
