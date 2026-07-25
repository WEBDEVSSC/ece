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
        Schema::create('citas_consulta_externa_laboratorios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cita_id')
                ->comment('Referencia a la cita de consulta externa')
                ->constrained('citas_consulta_externa')
                ->cascadeOnDelete();

            $table->decimal('hemoglobina', 5, 2)
                ->nullable()
                ->comment('Hemoglobina (g/dL)');

            $table->decimal('glucosa_serica', 6, 2)
                ->nullable()
                ->comment('Glucosa sérica (mg/dL)');

            $table->decimal('trigliceridos', 6, 2)
                ->nullable()
                ->comment('Triglicéridos (mg/dL)');

            $table->decimal('colesterol_ldl', 6, 2)
                ->nullable()
                ->comment('Colesterol LDL (mg/dL)');

            $table->decimal('colesterol_hdl', 6, 2)
                ->nullable()
                ->comment('Colesterol HDL (mg/dL)');

            $table->decimal('colesterol_total', 6, 2)
                ->nullable()
                ->comment('Colesterol total (mg/dL)');

            $table->decimal('microalbuminuria', 6, 2)
                ->nullable()
                ->comment('Microalbuminuria (mg/L)');

            $table->timestamps();

            $table->unique('cita_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa_laboratorios');
    }
};
