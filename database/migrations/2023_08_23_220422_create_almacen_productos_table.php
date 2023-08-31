<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen__productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("almacen_id");
            $table->foreign("almacen_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("producto_id");
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Stock')->nullable();
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
        Schema::dropIfExists('almacen_productos');
    }
}
