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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('cedula', 30)->unique();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->date('fecha_Nacimiento');
            $table->string('estado', 100);
            $table->string('municipio', 100);
            $table->string('parroquia', 100);
            $table->string('telefono', 30);
            $table->string('correo', 100)->unique();
            $table->string('clave');
            $table->boolean('estatus')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
