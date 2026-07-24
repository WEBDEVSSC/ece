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
        Schema::table('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            // Renombrar el campo
            $table->renameColumn('tension_arterial', 'tension_arterial_sistolica');
        });

        Schema::table('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            // Agregar el nuevo campo después del sistólico
            $table->string('tension_arterial_diastolica', 10)
                  ->nullable()
                  ->after('tension_arterial_sistolica');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            $table->dropColumn('tension_arterial_diastolica');
        });

        Schema::table('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            $table->renameColumn('tension_arterial_sistolica', 'tension_arterial');
        });
    }
};
