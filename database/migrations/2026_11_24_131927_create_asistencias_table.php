<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_clase')->constrained('clases')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_usuario')->constrained('usuarios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_estado_asistencia')->constrained('estado_asistencia')->cascadeOnUpdate();
            $table->text('observacion')->nullable();
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_clase', 'id_usuario']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};