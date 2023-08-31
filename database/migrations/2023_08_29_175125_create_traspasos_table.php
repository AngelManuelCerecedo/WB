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
            $table->unsignedBigInteger("almacenO_id");
            $table->foreign("almacenO_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("almacenD_id");
            $table->foreign("almacenD_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("producto_id");
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleadoO_id");
            $table->string ('Cantidad')->nullable();
            $table->foreign("empleadoO_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleadoD_id");
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
