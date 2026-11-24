<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor_seccion')->constrained('profesor_seccion')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_bloque_horario')->constrained('bloque_horario')->cascadeOnUpdate();
            $table->enum('dia_semana', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']);
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_profesor_seccion', 'id_bloque_horario', 'dia_semana'], 'horario_unico_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};