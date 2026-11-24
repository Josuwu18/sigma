<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_carrera')->constrained('carreras')->cascadeOnUpdate();
            $table->foreignId('id_semestre')->constrained('semestres')->cascadeOnUpdate();
            $table->foreignId('id_seccion')->constrained('secciones')->cascadeOnUpdate();
            $table->foreignId('id_periodo_academico')->constrained('periodo_academicos')->cascadeOnUpdate();
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_usuario', 'id_carrera', 'id_periodo_academico'], 'inscripcion_unica_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};