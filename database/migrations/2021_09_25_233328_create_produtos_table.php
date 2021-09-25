<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->integer('quantidade');
            $table->integer('valor_uni');
            $table->string('imagem');
            $table->integer('quantidade_estoque');
            $table->string('observacao');
            $table->integer('status_produto');
            $table->integer('desconto_porcento');
            $table->boolean('is_retirar');
            $table->integer('valor_entrega');

            $table->unsignedBigInteger('variacao_produto_id')->nullable(true);
            $table->foreign('variacao_produto_id')->references('id')->on('variacao_produtos');

            $table->unsignedBigInteger('categoria_produto_id')->nullable(true);
            $table->foreign('categoria_produto_id')->references('id')->on('categoria_produtos');

            $table->unsignedBigInteger('user_id_cadastro')->nullable(true);
            $table->foreign('user_id_cadastro')->references('id')->on('users');

            $table->unsignedBigInteger('user_id_alteracao')->nullable(true);
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
        Schema::dropIfExists('produtos');
    }
}
