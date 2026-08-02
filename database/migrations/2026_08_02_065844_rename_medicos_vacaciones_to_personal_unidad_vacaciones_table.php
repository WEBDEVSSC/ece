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
        Schema::rename('medicos_vacaciones', 'personal_unidad_vacaciones');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('personal_unidad_vacaciones', 'medicos_vacaciones');
    }
};
