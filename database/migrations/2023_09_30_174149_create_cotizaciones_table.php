<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->string ('Folio');
            $table->Integer ('Aux');
            $table->string ('Estatus')->nullable();
            $table->string ('Cliente')->nullable();
            $table->string ('Importe1')->nullable();
            $table->string ('Importe2')->nullable();
            $table->string ('Importe3')->nullable();
            $table->unsignedBigInteger("almacen_id");
            $table->foreign("almacen_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Cantidad')->nullable();
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cotizaciones');
    }
}
