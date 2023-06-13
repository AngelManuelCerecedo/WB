<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string ('Marca')->nullable();
            $table->string ('CodigoB')->nullable();
            $table->string ('Nombre')->nullable();
            $table->string ('UnidadM')->nullable();
            $table->string ('StockMin')->nullable();
            $table->string ('StockMax')->nullable();
            $table->string ('Precio')->nullable();
            $table->string ('Precio1')->nullable();
            $table->string ('Precio2')->nullable();
            $table->string ('Precio3')->nullable();
            $table->string ('Clave1')->nullable();
            $table->string ('Clave2')->nullable();
            $table->string ('Clave3')->nullable();
            $table->string ('Clave4')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
