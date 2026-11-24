<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pensums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')->constrained('carreras')->cascadeOnDelete();
            $table->foreignId('id_semestre')->constrained('semestres');
            $table->foreignId('id_materia')->constrained('materias');
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_carrera', 'id_materia']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pensums');
    }
};