<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('variacaos', function (Blueprint $table) {
//            $table->id();
//            $table->string('nome');
//            $table->string('descricao')->nullable();
//            $table->double('qtd_opcao')->nullable();
//            $table->string('imagem')->nullable();
//            $table->integer('minimo_item')->nullable();
//            $table->integer('maximo_item')->nullable();
//
//            $table->unsignedBigInteger('user_id_cadastro')->nullable();
//            $table->foreign('user_id_cadastro')->references('id')->on('users');
//
//            $table->unsignedBigInteger('user_id_alteracao')->nullable();
//            $table->foreign('user_id_alteracao')->references('id')->on('users');
//
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('variacaos');
    }
}
