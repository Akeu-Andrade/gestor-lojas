<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('status_compra_usuario')->default(1); //Enum
            $table->integer('forma_pagamento')->default(1); //Enum
            $table->double('quantidade')->nullable();

            $table->unsignedBigInteger('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->unsignedBigInteger('user_comprador_id')->nullable();
            $table->foreign('user_comprador_id')->references('id')->on('users');

            $table->unsignedBigInteger('user_id_cadastro')->nullable();
            $table->foreign('user_id_cadastro')->references('id')->on('users');

            $table->unsignedBigInteger('user_id_alteracao')->nullable();
            $table->foreign('user_id_alteracao')->references('id')->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('compra_usuarios');
    }
}
