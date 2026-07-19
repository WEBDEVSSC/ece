<?php

namespace Database\Seeders;

use App\Models\CatEstadoCivil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $estadosCiviles = [
            'Soltero(a)',
            'Casado(a)',
            'Unión libre',
            'Separado(a)',
            'Divorciado(a)',
            'Viudo(a)',
            'Concubinato',
            'Se desconoce',
        ];

        foreach ($estadosCiviles as $estadoCivil) {
            CatEstadoCivil::create([
                'estado_civil' => $estadoCivil,
            ]);
        }
    }
}
