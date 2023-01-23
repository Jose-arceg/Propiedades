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
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('nombre de la propiedad');
            $table->string('condicion')->comment('condicion de la propiedad');
            $table->integer('arriendo')->comment('Valor del arriendo');
            $table->integer('venta')->comment('Valor de venta');
            $table->string('estado')->default('En espera')->comment('En arriendo, En venta, En espera');
            $table->integer('baños')->comment('Cantidad de baños');
            $table->integer('piezas')->comment('Cantidad de piezas de la propiedad');
            $table->integer('estacionamiento')->comment('Cantidad de espacios para estacionar');
            $table->string('tipo')->comment('Tipo de propiedad: Casa, Departamento, Oficina');
            $table->integer('construido')->comment('Metros cuadrados construidos');
            $table->integer('terreno')->comment('Metros cuadrados de terreno');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('propiedads');
    }
};
