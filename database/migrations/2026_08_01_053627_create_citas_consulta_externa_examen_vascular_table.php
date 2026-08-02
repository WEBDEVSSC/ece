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
        Schema::create('citas_consulta_externa_examen_vascular', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cita_id')
                ->constrained('citas_consulta_externa')
                ->cascadeOnDelete()
                ->comment('Referencia a la cita de consulta externa');

            // ==========================
            // PIE DERECHO - SISTEMA ARTERIAL
            // ==========================
            $table->unsignedSmallInteger('pd_pulso_pedio')->default(0)->comment('Pulso pedio por minuto');
            $table->unsignedTinyInteger('pd_pulso_pedio_calificacion')->default(0)->comment('Calificación del pulso pedio');

            $table->unsignedSmallInteger('pd_llenado_capilar')->default(0)->comment('Llenado capilar en segundos');
            $table->unsignedTinyInteger('pd_llenado_capilar_calificacion')->default(0)->comment('Calificación del llenado capilar');

            $table->unsignedTinyInteger('pd_sistema_arterial_subtotal')->default(0);

            // ==========================
            // PIE DERECHO - SISTEMA VENOSO
            // ==========================
            $table->unsignedTinyInteger('pd_varices')->default(0);
            $table->unsignedTinyInteger('pd_edema')->default(0);

            $table->unsignedTinyInteger('pd_sistema_venoso_subtotal')->default(0);

            // ==========================
            // PIE IZQUIERDO - SISTEMA ARTERIAL
            // ==========================
            $table->unsignedSmallInteger('pi_pulso_pedio')->default(0)->comment('Pulso pedio por minuto');
            $table->unsignedTinyInteger('pi_pulso_pedio_calificacion')->default(0)->comment('Calificación del pulso pedio');

            $table->unsignedSmallInteger('pi_llenado_capilar')->default(0)->comment('Llenado capilar en segundos');
            $table->unsignedTinyInteger('pi_llenado_capilar_calificacion')->default(0)->comment('Calificación del llenado capilar');

            $table->unsignedTinyInteger('pi_sistema_arterial_subtotal')->default(0);

            // ==========================
            // PIE IZQUIERDO - SISTEMA VENOSO
            // ==========================
            $table->unsignedTinyInteger('pi_varices')->default(0);
            $table->unsignedTinyInteger('pi_edema')->default(0);

            $table->unsignedTinyInteger('pi_sistema_venoso_subtotal')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa_examen_vascular');
    }
};
