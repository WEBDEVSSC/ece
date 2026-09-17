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
                ->after('alergias');

            $table->foreign('dx_id')
                ->references('id')
                ->on('cat_diagnosticos_medicos')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropForeign(['dx_id']);
            $table->dropColumn('dx_id');
        });
    }
};
