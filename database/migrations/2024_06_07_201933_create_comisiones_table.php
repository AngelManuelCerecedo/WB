<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->string ('Total')->nullable();
            $table->unsignedBigInteger("comisionista_id")->nullable();
            $table->foreign("comisionista_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("fichai_id")->nullable();
            $table->foreign("fichai_id")->references("id")->on("ficha_ingresos")->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('_comisiones');
    }
}
