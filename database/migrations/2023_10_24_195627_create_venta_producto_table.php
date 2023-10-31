<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta__productos', function (Blueprint $table) {
            $table->id();
            $table->string ('Cantidad')->nullable();
            $table->string ('Descuento')->nullable();
            $table->string ('Promo')->nullable();
            $table->string ('Precio')->nullable();
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("venta_id")->nullable();
            $table->foreign("venta_id")->references("id")->on("ventas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("lote_id")->nullable();
            $table->foreign("lote_id")->references("id")->on("lotes")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('venta_producto');
    }
}
