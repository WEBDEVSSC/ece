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
            'SOLTERO(A)',
            'CASADO(A)',
            'UNIÓN LIBRE',
            'SEPARADO(A)',
            'DIVORCIADO(A)',
            'VIUDO(A)',
            'CONCUBINATO',
            'SE DESCONOCE',
        ];

        foreach ($estadosCiviles as $estadoCivil) {
            CatEstadoCivil::create([
                'estado_civil' => $estadoCivil,
            ]);
        }
    }
}
