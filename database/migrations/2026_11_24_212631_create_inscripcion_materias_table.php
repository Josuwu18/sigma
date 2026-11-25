<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripcion_materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_inscripcion')->constrained('inscripciones')->cascadeOnDelete();
            $table->foreignId('id_profesor_seccion')->constrained('profesor_seccion');
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            // Evita que el alumno inscriba exactamente la misma oferta dos veces en la misma planilla
            $table->unique(['id_inscripcion', 'id_profesor_seccion'], 'inscripcion_materia_unica_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripcion_materias');
    }
};