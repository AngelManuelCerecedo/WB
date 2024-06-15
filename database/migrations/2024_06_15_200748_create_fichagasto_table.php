<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichagastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gastos', function (Blueprint $table) {
            $table->id();
            $table->string ('Folio')->nullable();
            $table->string ('Beneficiario')->nullable();
            $table->date ('Fecha')->nullable();
            $table->string ('Total')->nullable();
            $table->string ('Factura')->nullable();
            $table->string ('FolioFact')->nullable();
            $table->string ('GastosF')->nullable();
            $table->unsignedBigInteger("formap_id")->nullable();
            $table->foreign("formap_id")->references("id")->on("forma_pagos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("banco_id")->nullable();
            $table->foreign("banco_id")->references("id")->on("bancos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empresa_id")->nullable();
            $table->foreign("empresa_id")->references("id")->on("empresas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Estatus')->nullable();
            $table->string ('Obs')->nullable();
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
        Schema::dropIfExists('fichagasto');
    }
}
