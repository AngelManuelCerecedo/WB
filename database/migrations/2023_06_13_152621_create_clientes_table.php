<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string ('ALIAS')->nullable();
            $table->string ('NOMBRE')->nullable();
            $table->string ('RS')->nullable();
            $table->string ('RFC')->nullable();
            $table->string ('CFDI')->nullable();
            $table->string ('REG')->nullable();
            $table->string ('DOMF')->nullable();
            $table->string ('CP')->nullable();
            $table->string ('COMTOT')->nullable();
            $table->string ('COMFINTECH')->nullable();
            $table->string ('COMEXT1')->nullable();
            $table->string ('COMISIONISTA1')->nullable();
            $table->string ('COMEXT2')->nullable();
            $table->string ('COMISIONISTA2')->nullable();
            $table->string ('COMEXT3')->nullable();
            $table->string ('COMISIONISTA3')->nullable();
            $table->string ('COMEXT4')->nullable();
            $table->string ('COMISIONISTA4')->nullable();
            $table->string ('COMEXT5')->nullable();
            $table->string ('COMISIONISTA5')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
