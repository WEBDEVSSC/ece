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
        Schema::table('cat_paises', function (Blueprint $table) {
            //
            $table->string('codigo_pais', 5)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cat_paises', function (Blueprint $table) {
            //
            $table->integer('codigo_pais')->change();
        });
    }
};
