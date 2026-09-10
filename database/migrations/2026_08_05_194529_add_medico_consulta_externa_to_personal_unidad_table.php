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
            $table->boolean('medico_consulta_externa')
                ->default(0)
                ->after('festivos_salida')
                ->comment('0 = No, 1 = Sí');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_unidad', function (Blueprint $table) {
            //
            $table->dropColumn('medico_consulta_externa');
        });
    }
};
