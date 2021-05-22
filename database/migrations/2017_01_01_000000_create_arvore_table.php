<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArvoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arvore', function (Blueprint $table) {
            $table->uuid("codigo")->primary()->index();
            $table->bigInteger('sequencia');
            $table->string("descricao", 100);
            $table->string("foto", 100)->nullable();
            $table->double("latitude");
            $table->double("longitude");
            $table->string("ponto_referencia", 255)->nullable();
            $table->integer("status");
            $table->timestamps();
            $table->string("codigo_pessoa", 36);
            $table->string("codigo_especie", 36);
            $table->string("codigo_regiao", 36);
            $table->foreign("codigo_pessoa")->references("codigo")->on("pessoa");
            $table->foreign("codigo_especie")->references("codigo")->on("especie");
            $table->foreign("codigo_regiao")->references("codigo")->on("regiao");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arvore');
    }
}
