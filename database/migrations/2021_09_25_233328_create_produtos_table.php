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
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->integer('quantidade')->nullable();
            $table->double('valor_uni')->nullable();
            $table->string('imagem')->nullable();
            $table->double('quantidade_estoque')->nullable();
            $table->string('observacao')->nullable();
            $table->integer('status_produto')->nullable();
            $table->double('desconto_porcento')->nullable();
            $table->boolean('is_retirar')->nullable();
            $table->double('valor_entrega')->nullable();

            $table->unsignedBigInteger('categoria_produto_id')->nullable();
            $table->foreign('categoria_produto_id')->references('id')->on('categoria_produtos');

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
        Schema::dropIfExists('produtos');
    }
}
