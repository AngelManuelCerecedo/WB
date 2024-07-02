<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('Movimiento')->nullable();
            $table->date('Fecha')->nullable();
            $table->string('Total')->nullable();
            $table->string('FolioF')->nullable();
            $table->date('FechaF')->nullable();
            $table->unsignedBigInteger("banco_id")->nullable();
            $table->foreign("banco_id")->references("id")->on("bancos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empresa_id")->nullable();
            $table->foreign("empresa_id")->references("id")->on("empresas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("fichaG_id")->nullable();
            $table->foreign("fichaG_id")->references("id")->on("ficha_gastos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("fichaD_id")->nullable();
            $table->foreign("fichaD_id")->references("id")->on("ficha_ingresos")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('_movimientos');
    }
}
