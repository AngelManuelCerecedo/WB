<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string ('Nombre')->nullable();
            $table->string ('Cel')->nullable();
            $table->string ('Tel')->nullable();
            $table->string ('Correo')->nullable();
            $table->string ('CP')->nullable();
            $table->string ('Dir')->nullable();
            $table->string ('Serie')->nullable();
            $table->string ('Rol')->nullable();
            $table->string ('Usu')->nullable();
            $table->string ('Pwd')->nullable();
            $table->string ('Estatus')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
