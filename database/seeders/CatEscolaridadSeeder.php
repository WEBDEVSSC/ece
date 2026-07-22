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
            'SIN ESCOLARIDAD',
            'PREESCOLAR',
            'PRIMARIA',
            'SECUNDARIA',
            'CARRERA TÉCNICA',
            'PREPARATORIA O BACHILLERATO',
            'TÉCNICO SUPERIOR UNIVERSITARIO (TSU)',
            'LICENCIATURA',
            'ESPECIALIDAD',
            'MAESTRÍA',
            'DOCTORADO',
            'POSDOCTORADO',
            'SE DESCONOCE',
        ];

        foreach ($escolaridades as $escolaridad) {
            CatEscolaridad::create([
                'escolaridad' => $escolaridad,
            ]);
        }
    }
}
