<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('Folio');
            $table->Integer('Aux');
            $table->string('Estatus')->nullable();
            $table->date('Fecha')->nullable();
            $table->string('TipoC')->nullable();
            $table->string('TipoCE')->nullable();
            $table->string('CostoE')->nullable();
            $table->string('ImporteC')->nullable();
            $table->string('ImporteTot')->nullable();
            $table->string('Desc')->nullable();
            $table->string('ImportePag')->nullable();
            $table->string('ImporteporPagar')->nullable();
            $table->date('FechaC')->nullable();
            $table->date('FechaL')->nullable();
            $table->string('Obs')->nullable();
            $table->unsignedBigInteger("almacen_id");
            $table->foreign("almacen_id")->references("id")->on("almacens")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("producto_id")->nullable();
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade')->onUpdate('cascade');
            $table->string('Cantidad')->nullable();
            $table->unsignedBigInteger("proveedor_id")->nullable();
            $table->foreign("proveedor_id")->references("id")->on("proveedors")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('compras');
    }
}
