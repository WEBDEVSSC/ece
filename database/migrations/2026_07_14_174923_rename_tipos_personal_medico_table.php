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
        //
        Schema::rename('tipos_personal_medico', 'cat_tipos_personal_medico');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::rename('cat_tipos_personal_medico', 'tipos_personal_medico');
    }
};
