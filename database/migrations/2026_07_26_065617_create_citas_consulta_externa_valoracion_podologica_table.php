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
        Schema::create('citas_consulta_externa_valoracion_podologica', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cita_id')
                ->constrained('citas_consulta_externa')
                ->cascadeOnDelete()
                ->comment('Referencia a la cita de consulta externa');

            // PIE DERECHO - HIPERQUERATOSIS
            $table->string('pd_plantar')->nullable();
            $table->string('pd_dorsal')->nullable();
            $table->string('pd_talar')->nullable();
            $table->string('pd_subtotal')->nullable();

            // PIE DERECHO - ALTERACIONES UNGUEALES
            $table->string('pd_onicogrifosis')->nullable();
            $table->string('pd_onicomicosis')->nullable();
            $table->string('pd_onicocriptosis')->nullable();

            // PIE DERECHO - OTRAS LOCALIZADAS
            $table->string('pd_bullosis')->nullable();
            $table->string('pd_ulcera')->nullable();
            $table->string('pd_necrosis')->nullable();
            $table->string('pd_grietas_fisuras')->nullable();
            $table->string('pd_lesiones_superficiales')->nullable();
            $table->string('pd_otras')->nullable();
            $table->string('pd_anhidrosis')->nullable();
            $table->string('pd_tinas')->nullable();
            $table->string('pd_proceso_infeccioso')->nullable();
            $table->string('pd_subtotal_otras_localizadas')->nullable();

            // PIE IZQUIERDO - HIPERQUERATOSIS
            $table->string('pi_plantar')->nullable();
            $table->string('pi_dorsal')->nullable();
            $table->string('pi_talar')->nullable();
            $table->string('pi_subtotal')->nullable();

            // PIE IZQUIERDO - ALTERACIONES UNGUEALES
            $table->string('pi_onicogrifosis')->nullable();
            $table->string('pi_onicomicosis')->nullable();
            $table->string('pi_onicocriptosis')->nullable();

            // PIE IZQUIERDO - OTRAS LOCALIZADAS
            $table->string('pi_bullosis')->nullable();
            $table->string('pi_ulcera')->nullable();
            $table->string('pi_necrosis')->nullable();
            $table->string('pi_grietas_fisuras')->nullable();
            $table->string('pi_lesiones_superficiales')->nullable();
            $table->string('pi_otras')->nullable();
            $table->string('pi_anhidrosis')->nullable();
            $table->string('pi_tinas')->nullable();
            $table->string('pi_proceso_infeccioso')->nullable();
            $table->string('pi_subtotal_otras_localizadas')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa_valoracion_podologica');
    }
};
