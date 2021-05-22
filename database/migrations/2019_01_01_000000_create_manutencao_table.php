<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManutencaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao', function (Blueprint $table) {
            $table->uuid("codigo")->primary()->index();
            $table->bigInteger('sequencia');
            $table->string("descricao", 255);
            $table->dateTime("data");
            $table->string("observacao", 255)->nullable();
            $table->integer("status_manutencao");
            $table->integer("status");
            $table->timestamps();
            $table->string("codigo_pessoa", 36);
            $table->string("codigo_pessoa_manutencao", 36);
            $table->string("codigo_tipo_manutencao", 36);
            $table->string("codigo_arvore", 36);
            $table->foreign("codigo_pessoa")->references("codigo")->on("pessoa");
            $table->foreign("codigo_pessoa_manutencao")->references("codigo")->on("pessoa");
            $table->foreign("codigo_tipo_manutencao")->references("codigo")->on("tipo_manutencao");
            $table->foreign("codigo_arvore")->references("codigo")->on("arvore");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencao');
    }
}
