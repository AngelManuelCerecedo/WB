<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraspasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traspasos', function (Blueprint $table) {
            $table->id();
            $table->string ('Folio');
            $table->Integer ('Aux');
            $table->unsignedBigInteger("almacenO_id");
            $table->foreign("almacenO_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("almacenD_id");
            $table->foreign("almacenD_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Cantidad')->nullable();
            $table->string ('Estatus')->nullable();
            $table->string ('Obs')->nullable();
            $table->unsignedBigInteger("empleadoO_id")->nullable();
            $table->foreign("empleadoO_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleadoD_id")->nullable();
            $table->foreign("empleadoD_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('traspasos');
    }
}
