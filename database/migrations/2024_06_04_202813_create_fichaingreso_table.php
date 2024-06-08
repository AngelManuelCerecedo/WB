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
            $table->string ('Tot1')->nullable();
            $table->unsignedBigInteger("comis1_id")->nullable();
            $table->foreign("comis1_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Tot2')->nullable();
            $table->unsignedBigInteger("comis2_id")->nullable();
            $table->foreign("comis2_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Tot3')->nullable();
            $table->unsignedBigInteger("comis3_id")->nullable();
            $table->foreign("comis3_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Tot4')->nullable();
            $table->unsignedBigInteger("comis4_id")->nullable();
            $table->foreign("comis4_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('Tot5')->nullable();
            $table->unsignedBigInteger("comis5_id")->nullable();
            $table->foreign("comis5_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
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
