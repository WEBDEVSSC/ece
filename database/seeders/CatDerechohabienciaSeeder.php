<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CatDerechohabiencia;

class CatDerechohabienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CatDerechohabiencia::insert([
            [
                'derechohabiencia' => 'NO ESPECIFICADO',
                'valor' => 0,
            ],
            [
                'derechohabiencia' => 'NINGUNA',
                'valor' => 1,
            ],
            [
                'derechohabiencia' => 'IMSS',
                'valor' => 2,
            ],
            [
                'derechohabiencia' => 'ISSSTE',
                'valor' => 3,
            ],
            [
                'derechohabiencia' => 'PEMEX',
                'valor' => 4,
            ],
            [
                'derechohabiencia' => 'SEDENA',
                'valor' => 5,
            ],
            [
                'derechohabiencia' => 'SEMAR',
                'valor' => 6,
            ],
            [
                'derechohabiencia' => 'OTRA',
                'valor' => 8,
            ],
            [
                'derechohabiencia' => 'IMSS BIENESTAR',
                'valor' => 10,
            ],
            [
                'derechohabiencia' => 'ISSFAM',
                'valor' => 11,
            ],
            [
                'derechohabiencia' => 'OPD IMSS BIENESTAR',
                'valor' => 14,
            ],
            [
                'derechohabiencia' => 'SE IGNORA',
                'valor' => 99,
            ],
        ]);
    }
}
