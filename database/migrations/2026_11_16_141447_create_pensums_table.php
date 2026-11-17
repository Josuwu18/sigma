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
        Schema::create('pensums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')->constrained('carreras')->onDelete('cascade');
            $table->foreignId('id_semestre')->constrained('semestres')->onDelete('restrict');
            $table->foreignId('id_materia')->constrained('materias')->onDelete('restrict');
            $table->unsignedTinyInteger('unidades_credito');
            $table->boolean('estatus')->default(true);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensums');
    }
};
