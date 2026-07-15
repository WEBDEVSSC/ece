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
            $table->dropColumn([
                'tipo_personal_label',
                'servicio_label',
                'clues_clues',
                'clues_label',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->string('tipo_personal_label')->nullable();
            $table->string('servicio_label')->nullable();
            $table->string('clues_clues')->nullable();
            $table->string('clues_label')->nullable();
        });
    }
};
