<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prelaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')->constrained('carreras')->cascadeOnDelete();
            $table->foreignId('id_materia_prelada')->constrained('materias')->cascadeOnDelete();
            $table->foreignId('id_materia_preladora')->constrained('materias')->cascadeOnDelete();
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_carrera', 'id_materia_prelada', 'id_materia_preladora'], 'prelaciones_unicas_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prelaciones');
    }
};