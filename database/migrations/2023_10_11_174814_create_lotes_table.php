<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string ('Numero')->nullable();
            $table->date ('Fecha')->nullable();
            $table->string ('Cantidad')->nullable();
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("compra_id")->nullable();
            $table->foreign("compra_id")->references("id")->on("compras")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("almacen_id")->nullable();
            $table->foreign("almacen_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lotes');
    }
}
