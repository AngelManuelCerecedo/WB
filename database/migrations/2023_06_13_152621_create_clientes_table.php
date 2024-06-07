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
            $table->unsignedBigInteger("comis1_id")->nullable();
            $table->foreign("comis1_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('COMEXT2')->nullable();
            $table->unsignedBigInteger("comis2_id")->nullable();
            $table->foreign("comis2_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('COMEXT3')->nullable();
            $table->unsignedBigInteger("comis3_id")->nullable();
            $table->foreign("comis3_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('COMEXT4')->nullable();
            $table->unsignedBigInteger("comis4_id")->nullable();
            $table->foreign("comis4_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
            $table->string ('COMEXT5')->nullable();
            $table->unsignedBigInteger("comis5_id")->nullable();
            $table->foreign("comis5_id")->references("id")->on("comisionistas")->onDelete('cascade')->onUpdate('cascade');
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
