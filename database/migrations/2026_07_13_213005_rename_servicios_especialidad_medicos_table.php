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
        Schema::rename(
            'servicios_especialidad_medicos',
            'cat_servicios_especialidad_medicos'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename(
            'cat_servicios_especialidad_medicos',
            'servicios_especialidad_medicos'
        );
    }
};
