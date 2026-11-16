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
        Schema::create('prelaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')->constrained('carreras')->onDelete('cascade');
            $table->foreignId('id_materia_prelada')->constrained('materias')->onDelete('cascade');
            $table->foreignId('id_materia_prelante')->constrained('materias')->onDelete('cascade');
            $table->integer('C_A_totales')->default(0);
            $table->unique(['id_carrera', 'id_materia_prelada', 'id_materia_prelante'], 'prelacion_unica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prelaciones');
    }
};
