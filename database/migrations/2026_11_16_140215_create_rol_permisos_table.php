<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rol')->constrained('roles')->cascadeOnDelete();
            $table->foreignId('id_permiso')->constrained('permisos')->cascadeOnDelete();
            $table->foreignId('id_modulo')->constrained('modulos')->cascadeOnDelete();
            $table->boolean('estatus')->default(true);
            $table->timestamps();

            $table->unique(['id_rol', 'id_modulo', 'id_permiso'], 'rol_modulo_permiso_unico');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rol_permisos');
    }
};