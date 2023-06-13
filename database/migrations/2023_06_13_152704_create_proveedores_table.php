<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string ('Nombre')->nullable();
            $table->string ('ApP')->nullable();
            $table->string ('ApM')->nullable();
            $table->string ('Cel')->nullable();
            $table->string ('Tel')->nullable();
            $table->string ('Correo')->nullable();
            $table->string ('CP')->nullable();
            $table->string ('Estado')->nullable();
            $table->string ('Mun')->nullable();
            $table->string ('Col')->nullable();
            $table->string ('Calle')->nullable();
            $table->string ('TipoP')->nullable();
            $table->string ('RFC')->nullable();
            $table->string ('NumExt')->nullable();
            $table->string ('NumInt')->nullable();
            $table->string ('Credito')->nullable();
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
        Schema::dropIfExists('proveedores');
    }
}