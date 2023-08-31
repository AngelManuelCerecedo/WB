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
            $table->string ('CURP')->nullable();
            $table->string ('RFC')->nullable();
            $table->string ('Nombre')->nullable();
            $table->string ('ApP')->nullable();
            $table->string ('ApM')->nullable();
            $table->string ('Cel')->nullable();
            $table->string ('Tel')->nullable();
            $table->string ('Correo')->nullable();
            $table->string ('CP')->nullable();
            $table->string ('Estado')->nullable();
            $table->string ('Mun')->nullable();
            $table->string ('Col')->nullable();
            $table->string ('Calle')->nullable();
            $table->string ('Referencia')->nullable();
            $table->string ('NumExt')->nullable();
            $table->string ('NumInt')->nullable();
            $table->string ('NomRF')->nullable();
            $table->string ('ParenRF')->nullable();
            $table->string ('TelRF')->nullable();
            $table->string ('DomRF')->nullable();
            $table->string ('Rol')->nullable();
            $table->string ('Usu')->nullable();
            $table->string ('Pwd')->nullable();
            $table->string ('Estatus')->nullable();
            $table->unsignedBigInteger("sucursal_id");
            $table->foreign("sucursal_id")->references("id")->on("sucursals")->onDelete('cascade')->onUpdate('cascade');
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
