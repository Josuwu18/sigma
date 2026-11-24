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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_seccion') ->constrained('seccions') ->onUpdate('cascade')->onDelete('cascade');
                    $table->date('fecha');
                    $table->time('hora_inicio');
                    $table->time('hora_fin');
                    $table->string('tema_visto', 255)->nullable();
                    $table->enum('estado_clase', ['impartida', 'suspendida', 'reprogramada'])->default('impartida');
                    $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
