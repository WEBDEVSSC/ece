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
            $table->enum('primera_vez', ['SI', 'NO'])
                  ->default('NO')
                  ->after('medico_id')
                  ->comment('SI / NO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas_consulta_externa', function (Blueprint $table) {
            $table->dropColumn('primera_vez');
        });
    }
};
