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
        Schema::table('cat_diagnosticos_medicos', function (Blueprint $table) {
            // Define el campo como texto, opcional (nullable) y posicionado después de 'nombre'
            $table->string('tipo_unidad')->nullable()->after('nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cat_diagnosticos_medicos', function (Blueprint $table) {
            $table->dropColumn('tipo_unidad');
        });
    }
};
