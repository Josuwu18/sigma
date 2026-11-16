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
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula', 30)->unique();
            $table->string('genero', 20);
            $table->date('fecha_Nacimiento');
            $table->string('ciudad', 100);
            $table->string('municipio', 100);
            $table->string('telefono', 30)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('estado')->default(true);
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
