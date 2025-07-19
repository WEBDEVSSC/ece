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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('curp')->unique();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->unsignedBigInteger('tipo_personal_id')->nullable();
            $table->string('tipo_personal_label')->nullable();
            $table->string('cedula_profesional')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->string('servicio_label')->nullable();
            $table->unsignedBigInteger('clues_id')->nullable();
            $table->string('clues_clues')->nullable();
            $table->string('clues_label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
