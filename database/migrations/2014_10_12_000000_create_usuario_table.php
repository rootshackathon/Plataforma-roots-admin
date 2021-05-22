<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->uuid("codigo")->primary()->index();
            $table->bigInteger('sequencia');
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer("status");
            $table->rememberToken();
            $table->timestamps();
            $table->string("codigo_pessoa", 36)->nulable();
            $table->string("codigo_tipo_usuario", 36)->nulable();
            $table->foreign("codigo_pessoa")->references("codigo")->on("pessoa");
            $table->foreign("codigo_tipo_usuario")->references("codigo")->on("tipo_usuario");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
