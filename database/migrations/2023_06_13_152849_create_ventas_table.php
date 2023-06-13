<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->string ('Estado')->nullable();
            $table->string ('RFC')->nullable();
            $table->string ('Tipo')->nullable();
            $table->string ('FormaP')->nullable();
            $table->string ('Metodo')->nullable();
            $table->string ('CFDI')->nullable();
            $table->string ('Importes')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
