<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVariacaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_variacao_produtos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');

            $table->unsignedBigInteger('variacao_produto_id')->nullable();
            $table->foreign('variacao_produto_id')->references('id')->on('variacao_produtos');

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
        Schema::dropIfExists('item_variacao_produtos');
    }
}
