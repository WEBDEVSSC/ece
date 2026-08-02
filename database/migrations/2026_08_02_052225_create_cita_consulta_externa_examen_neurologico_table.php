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
        Schema::create('citas_consulta_externa_examen_neurologico', function (Blueprint $table) {
            $table->id();

            // Llave foránea hacia citas_consulta_externa
            $table->foreignId('cita_id')
                ->constrained('citas_consulta_externa')
                ->onDelete('cascade');

            // --- PIE DERECHO ---
            // Sistema Perceptual
            $table->integer('pd_sensibilidad_tactil')->default(0);
            $table->integer('pd_sensibilidad_vibratoria')->default(0);
            $table->integer('pd_subtotal_sistema_perceptual')->default(0);

            // Sistema Motor
            $table->integer('pd_reflejo_rotuliano')->default(0);
            $table->integer('pd_dorsiflexion')->default(0);
            $table->integer('pd_apertura_dedos')->default(0);
            $table->integer('pd_subtotal_sistema_motor')->default(0);

            // Total Pie Derecho
            $table->integer('pd_calificacion_total')->default(0);

            // --- PIE IZQUIERDO ---
            // Sistema Perceptual
            $table->integer('pi_sensibilidad_tactil')->default(0);
            $table->integer('pi_sensibilidad_vibratoria')->default(0);
            $table->integer('pi_subtotal_sistema_perceptual')->default(0);

            // Sistema Motor
            $table->integer('pi_reflejo_rotuliano')->default(0);
            $table->integer('pi_dorsiflexion')->default(0);
            $table->integer('pi_apertura_dedos')->default(0);
            $table->integer('pi_subtotal_sistema_motor')->default(0);

            // Total Pie Izquierdo
            $table->integer('pi_calificacion_total')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita_consulta_externa_examen_neurologico');
    }
};
