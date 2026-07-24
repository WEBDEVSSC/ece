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
        Schema::create('citas_consulta_externa_signos_vitales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_cita')
                ->constrained('citas_consulta_externa')
                ->cascadeOnDelete();

            $table->decimal('temperatura', 4, 1)->nullable()->comment('°C');
            $table->unsignedSmallInteger('frecuencia_cardiaca')->nullable()->comment('lpm');
            $table->unsignedSmallInteger('frecuencia_respiratoria')->nullable()->comment('rpm');
            $table->unsignedSmallInteger('saturacion_oxigeno')->nullable()->comment('%');
            $table->string('tension_arterial', 10)->nullable()->comment('120/80');
            $table->decimal('glicemia_capilar', 5, 1)->nullable()->comment('mg/dL');
            $table->decimal('circunferencia_cintura', 5, 2)->nullable()->comment('cm');
            $table->decimal('peso', 5, 2)->nullable()->comment('kg');
            $table->decimal('talla', 4, 2)->nullable()->comment('m');
            $table->decimal('imc', 5, 2)->nullable();

            $table->timestamps();

            $table->unique('id_cita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_consulta_externa_signos_vitales');
    }
};
