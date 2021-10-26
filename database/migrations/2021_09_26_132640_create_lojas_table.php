<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loja_configs', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('cor')->nullable();
            $table->string('cor_dois')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('descricao')->nullable();
            $table->string('numero')->nullable();
            $table->string('link_whatsapp')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('outro_link')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('link_app')->nullable();

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
        Schema::dropIfExists('loja_configs');
    }
}
