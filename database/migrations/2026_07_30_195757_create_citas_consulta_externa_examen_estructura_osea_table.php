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
        Schema::create('citas_consulta_externa_examen_estructura_osea', function (Blueprint $table) {
            $table->id();

            // Llave Foránea hacia la tabla citas_consulta_externa
            $table->foreignId('cita_id')
                  ->constrained('citas_consulta_externa')
                  ->onDelete('cascade');

            /* ==========================================================
               PIE DERECHO (pd_)
               ========================================================== */
            $table->string('pd_dedos_garra')->nullable();
            $table->string('pd_dedos_martillo')->nullable();
            $table->string('pd_hallux_valgus')->nullable();
            $table->string('pd_infraducto')->nullable();
            $table->string('pd_supraducto')->nullable();
            $table->string('pd_hipercarga_metatarsio')->nullable();
            $table->string('pd_pie_charcot')->nullable();
            $table->string('pd_subtotal')->nullable();

            /* ==========================================================
               PIE IZQUIERDO (pi_)
               ========================================================== */
            $table->string('pi_dedos_garra')->nullable();
            $table->string('pi_dedos_martillo')->nullable();
            $table->string('pi_hallux_valgus')->nullable();
            $table->string('pi_infraducto')->nullable();
            $table->string('pi_supraducto')->nullable();
            $table->string('pi_hipercarga_metatarsio')->nullable();
            $table->string('pi_pie_charcot')->nullable();
            $table->string('pi_subtotal')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa_examen_estructura_osea');
    }
};
