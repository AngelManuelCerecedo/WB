<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();
            $table->string ('Zona')->nullable();
            $table->string ('Clave')->nullable();
            $table->string ('Nombre')->nullable();
            $table->string ('CP')->nullable();
            $table->string ('FolioTicket')->nullable();
            $table->string ('FolioFactura')->nullable();
            $table->string ('SerieF')->nullable();
            $table->string ('Telefono')->nullable();
            $table->string ('Direccion')->nullable();
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
        Schema::dropIfExists('sucursales');
    }
}
