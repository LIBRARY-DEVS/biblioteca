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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("disponibilidad");
            $table->string("area");
            $table->string("palabras_clave");
            $table->string("anio_publicacion");
            $table->integer("existencia_virtual");
            $table->string("descripcion");
            $table->string("tipo_documento");
            $table->unsignedBigInteger("autor_id");
            $table->unsignedBigInteger("editorial_id");
            $table->timestamps();

            $table->foreign('autor_id')->references('id')->on('autores');
            $table->foreign('editorial_id')->references('id')->on('editoriales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
