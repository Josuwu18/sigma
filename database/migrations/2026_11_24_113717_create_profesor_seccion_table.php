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
        Schema::create('profesor_seccion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_seccion')->constrained('seccions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_materia')->constrained('materias')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_carrera')->constrained('carreras')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_seccion');
    }
};
