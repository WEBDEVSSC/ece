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
        Schema::table('medicos', function (Blueprint $table) {
            $table->time('lunes_entrada')->nullable()->after('clues_id');
            $table->time('lunes_salida')->nullable()->after('lunes_entrada');

            $table->time('martes_entrada')->nullable()->after('lunes_salida');
            $table->time('martes_salida')->nullable()->after('martes_entrada');

            $table->time('miercoles_entrada')->nullable()->after('martes_salida');
            $table->time('miercoles_salida')->nullable()->after('miercoles_entrada');

            $table->time('jueves_entrada')->nullable()->after('miercoles_salida');
            $table->time('jueves_salida')->nullable()->after('jueves_entrada');

            $table->time('viernes_entrada')->nullable()->after('jueves_salida');
            $table->time('viernes_salida')->nullable()->after('viernes_entrada');

            $table->time('sabado_entrada')->nullable()->after('viernes_salida');
            $table->time('sabado_salida')->nullable()->after('sabado_entrada');

            $table->time('domingo_entrada')->nullable()->after('sabado_salida');
            $table->time('domingo_salida')->nullable()->after('domingo_entrada');

            $table->time('festivos_entrada')->nullable()->after('domingo_salida');
            $table->time('festivos_salida')->nullable()->after('festivos_entrada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
             $table->dropColumn([
                'lunes_entrada',
                'lunes_salida',
                'martes_entrada',
                'martes_salida',
                'miercoles_entrada',
                'miercoles_salida',
                'jueves_entrada',
                'jueves_salida',
                'viernes_entrada',
                'viernes_salida',
                'sabado_entrada',
                'sabado_salida',
                'domingo_entrada',
                'domingo_salida',
                'festivos_entrada',
                'festivos_salida',
            ]);
        });
    }
};
