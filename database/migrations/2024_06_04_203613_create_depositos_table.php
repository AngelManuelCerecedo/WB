<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositos', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha')->nullable();
            $table->string('Total')->nullable();
            $table->string('FolioF')->nullable();
            $table->string('NumeroF')->nullable();
            $table->unsignedBigInteger("banco_id")->nullable();
            $table->foreign("banco_id")->references("id")->on("bancos")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empresa_id")->nullable();
            $table->foreign("empresa_id")->references("id")->on("empresas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("empleado_id")->nullable();
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("ficha_id")->nullable();
            $table->foreign("ficha_id")->references("id")->on("ficha_ingresos")->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('depositos');
    }
}
