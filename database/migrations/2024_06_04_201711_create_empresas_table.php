<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string ('Nombre')->nullable();
            $table->string ('NCorto')->nullable();
            $table->string ('RFC')->nullable();
            $table->string ('Giro')->nullable();
            $table->string ('B1')->nullable();
            $table->string ('B2')->nullable();
            $table->string ('B3')->nullable();
            $table->string ('B4')->nullable();
            $table->string ('B5')->nullable();
            $table->string ('C1')->nullable();
            $table->string ('C2')->nullable();
            $table->string ('C3')->nullable();
            $table->string ('C4')->nullable();
            $table->string ('C5')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
