<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSituacaoArvoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacao_arvore', function (Blueprint $table) {
            $table->uuid("codigo")->primary()->index();
            $table->bigInteger('sequencia');
            $table->dateTime("data");
            $table->string("observacao", 255)->nullable();
            $table->integer("status");
            $table->timestamps();
            $table->string("codigo_tipo_situacao_arvore", 36);
            $table->string("codigo_arvore", 36);
            $table->foreign("codigo_tipo_situacao_arvore")->references("codigo")->on("tipo_situacao_arvore");
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
        Schema::dropIfExists('situacao_arvore');
    }
}
