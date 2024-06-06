<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_ingresos', function (Blueprint $table) {
            $table->id();
            $table->string ('Folio')->nullable();
            $table->date ('Fecha')->nullable();
            $table->string ('Total')->nullable();
            $table->string ('Comision')->nullable();
            $table->string ('GastosF')->nullable();
            $table->string ('ComisionWB')->nullable();
            $table->string ('Estatus')->nullable();
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Obs')->nullable();
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
        Schema::dropIfExists('fichaingreso');
    }
}
