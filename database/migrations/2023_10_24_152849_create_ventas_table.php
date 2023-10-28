<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('Folio');
            $table->string('Aux');
            $table->string ('Importes')->nullable();
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("sucursal_id")->nullable();
            $table->foreign("sucursal_id")->references("id")->on("sucursals")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("forma_id")->nullable();
            $table->foreign("forma_id")->references("id")->on("forma_pagos")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ventas');
    }
}
