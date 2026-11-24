<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuarios')->constrained('usuarios')->cascadeOnDelete();
            $table->foreignId('id_rol')->constrained('roles')->cascadeOnDelete();
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_usuarios', 'id_rol']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};