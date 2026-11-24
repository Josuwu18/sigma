<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bloque_horario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->enum('turno', ['mañana', 'tarde', 'noche']);
            $table->boolean('estatus')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bloque_horario');
    }
};