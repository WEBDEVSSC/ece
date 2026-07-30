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
        Schema::table('citas_consulta_externa', function (Blueprint $table) {
            $table->boolean('status_examen_estructura_osea')
                ->default(0)
                ->after('status_valoracion_podologica')
                ->comment('0 = Pendiente, 1 = Tomados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas_consulta_externa', function (Blueprint $table) {
            $table->dropColumn('status_examen_estructura_osea');
        });
    }
};
