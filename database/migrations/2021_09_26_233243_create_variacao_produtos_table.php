<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariacaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variacao_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->double('qtd_opcao')->nullable();
            $table->string('imagem')->nullable();

            $table->unsignedBigInteger('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produtos');

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
        Schema::dropIfExists('variacao_produtos');
    }
}
