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
        Schema::table('personal_unidad_vacaciones', function (Blueprint $table) {
            $table->renameColumn('medico_id', 'personal_unidad_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_unidad_vacaciones', function (Blueprint $table) {
            $table->renameColumn('personal_unidad_id', 'medico_id');
        });
    }
};
