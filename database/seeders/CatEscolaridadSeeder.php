<?php

namespace Database\Seeders;

use App\Models\CatEscolaridad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEscolaridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $escolaridades = [
            'Sin escolaridad',
            'Preescolar',
            'Primaria incompleta',
            'Primaria completa',
            'Secundaria incompleta',
            'Secundaria completa',
            'Carrera técnica',
            'Preparatoria o Bachillerato incompleto',
            'Preparatoria o Bachillerato completo',
            'Técnico Superior Universitario (TSU)',
            'Licenciatura incompleta',
            'Licenciatura completa',
            'Especialidad',
            'Maestría',
            'Doctorado',
            'Posdoctorado',
            'Se desconoce',
        ];

        foreach ($escolaridades as $escolaridad) {
            CatEscolaridad::create([
                'escolaridad' => $escolaridad,
            ]);
        }
    }
}
