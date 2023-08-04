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
            $table->string ('Nombre')->nullable();
            $table->string ('CodigoB')->nullable();
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
            $table->string ('IVA')->nullable();
            $table->string ('Estatus')->nullable();
            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id")->on("marcas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("unidad_id")->nullable();
            $table->foreign("unidad_id")->references("id")->on("unidad_medidas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("proveedor_id")->nullable();
            $table->foreign("proveedor_id")->references("id")->on("proveedors")->onDelete('cascade')->onUpdate('cascade');
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
