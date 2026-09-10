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
        Schema::table('personal_unidad', function (Blueprint $table) {
            $table->boolean('lunes_atiende')->nullable()->default(false)->after('lunes_salida');
            $table->boolean('martes_atiende')->nullable()->default(false)->after('martes_salida');
            $table->boolean('miercoles_atiende')->nullable()->default(false)->after('miercoles_salida');
            $table->boolean('jueves_atiende')->nullable()->default(false)->after('jueves_salida');
            $table->boolean('viernes_atiende')->nullable()->default(false)->after('viernes_salida');
            $table->boolean('sabado_atiende')->nullable()->default(false)->after('sabado_salida');
            $table->boolean('domingo_atiende')->nullable()->default(false)->after('domingo_salida');
            $table->boolean('festivos_atiende')->nullable()->default(false)->after('festivos_salida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_unidad', function (Blueprint $table) {
            $table->dropColumn([
                'lunes_atiende',
                'martes_atiende',
                'miercoles_atiende',
                'jueves_atiende',
                'viernes_atiende',
                'sabado_atiende',
                'domingo_atiende',
                'festivos_atiende',
            ]);
        });
    }
};
