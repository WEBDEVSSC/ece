<?php

namespace Database\Seeders;

use App\Models\CatParentesco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentescos = [
            'PADRE',
            'MADRE',
            'HIJO/A',
            'HERMANO/A',
            'ESPOSO/A',
            'PAREJA',
            'ABUELO/A',
            'NIETO/A',
            'TÍO/A',
            'SOBRINO/A',
            'PRIMO/A',
            'TUTOR/A',
            'REPRESENTANTE LEGAL',
            'AMIGO/A',
            'CUIDADOR/A',
            'OTRO',
        ];

        foreach ($parentescos as $parentesco) {
            CatParentesco::create([
                'parentesco' => $parentesco,
            ]);
        }
    }
}
