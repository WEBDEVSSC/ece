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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            $table->string('curp', 18)->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();

            $table->enum('sexo', ['H', 'M']);

            $table->date('fecha_nacimiento');

            $table->foreignId('escolaridad_id')
                ->constrained('cat_escolaridad')
                ->nullable()
                ->restrictOnDelete();

            $table->foreignId('estado_civil_id')
                ->constrained('cat_estado_civil')
                ->nullable()
                ->restrictOnDelete();

            $table->text('alergias')->nullable();

            $table->foreignId('diagnostico_medico_id')
                ->constrained('cat_cie_10')
                ->nullable()
                ->restrictOnDelete();

            $table->string('celular', 10)->nullable();

            $table->string('email')->nullable();

            $table->unsignedBigInteger('no_expediente')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
