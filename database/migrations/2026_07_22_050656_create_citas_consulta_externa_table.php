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
        Schema::create('citas_consulta_externa', function (Blueprint $table) {
            $table->id();    
        
            $table->dateTime('fecha');

            $table->foreignId('paciente_id')
                  ->constrained('pacientes')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('medico_id')
                  ->constrained('medicos')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('clues_id')
                  ->constrained('cat_clues')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('status', 20)->default('NUEVA');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa');
    }
};
