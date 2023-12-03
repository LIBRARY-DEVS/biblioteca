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
        Schema::create('idioma_libros', function (Blueprint $table) {
            $table->id();
            $table->integer("cantidad");
            $table->unsignedBigInteger("libro_id");
            $table->unsignedBigInteger("idioma_id");
            $table->timestamps();

            $table->foreign('libro_id')->references('id')->on('libros');
            $table->foreign('idioma_id')->references('id')->on('idiomas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idioma_libros');
    }
};
