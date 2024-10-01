<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ponto_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('contato');
            $table->string('latitude_longitude');
            $table->text('descricao');
            $table->text('como_chegar');
            $table->text('imagem');

            $table->unsignedBigInteger('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos');

            $table->unsignedBigInteger('id_tipo_ponto_turistico');
            $table->foreign('id_tipo_ponto_turistico')->references('id')->on('tipo_ponto_turisticos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto_turisticos');
    }
};
