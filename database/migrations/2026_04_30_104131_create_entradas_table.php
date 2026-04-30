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
    Schema::create('entradas', function (Blueprint $table) {
        $table->id('id_entrada');

        $table->unsignedBigInteger('id_sesion');
        $table->unsignedBigInteger('id_usuario');

        $table->integer('fila');
        $table->integer('columna');

        $table->foreign('id_sesion')
              ->references('id_sesion')->on('sesiones')
              ->onDelete('cascade');

        $table->foreign('id_usuario')
              ->references('id_usuario')->on('usuarios')
              ->onDelete('cascade');

        $table->unique(['id_sesion', 'fila', 'columna']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
