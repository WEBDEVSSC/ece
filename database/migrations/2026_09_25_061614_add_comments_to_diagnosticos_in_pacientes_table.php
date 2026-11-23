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
        Schema::table('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('dx_id')
                ->nullable()
                ->comment('Diagnóstico de la Unidad')
                ->change();

            $table->unsignedBigInteger('diagnostico_medico_id')
                ->nullable()
                ->comment('Diagnóstico CIE-10')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('dx_id')
                ->nullable()
                ->comment(null)
                ->change();

            $table->unsignedBigInteger('diagnostico_medico_id')
                ->nullable()
                ->comment(null)
                ->change();
        });
    }
};