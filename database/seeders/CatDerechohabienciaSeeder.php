<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CatDerechohabiencia;

class CatDerechohabienciaSeeder extends Seeder
{
    public function run(): void
    {
        $registros = [
            'IMSS',
            'INSABI',
            'ISSSTE',
            'MAGISTERIO',
            'HUS',
            'PEMEX',
            'MUNICIPIO',
            'PRIVADA',
        ];

        foreach ($registros as $nombre) {
            CatDerechohabiencia::firstOrCreate([
                'derechohabiencia' => $nombre,
            ]);
        }
    }
}
