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
            //
            $table->unsignedTinyInteger('glicemia_capilar_medicion')
                ->default(0)
                ->after('glicemia_capilar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            $table->dropColumn('glicemia_capilar_medicion');
        });
    }
};
