<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPersonalMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tipos = [
            1 => 'MÉDICO(A) PASANTE',
            2 => 'MÉDICA(O) GENERAL',
            3 => 'MÉDICA(O) RESIDENTE',
            4 => 'MÉDICA(O) ESPECIALISTA',
            5 => 'PASANTE DE ENFERMERÍA',
            6 => 'ENFERMERO(A)',
            7 => 'PASANTE DE NUTRICIÓN',
            8 => 'NUTRIÓLOGA(O)',
            9 => 'HOMEÓPATA',
            10 => 'MÉDICA(O) TRADICIONAL INDÍGENA',
            11 => 'TÉCNICO EN ATENCIÓN PRIMARIA A LA SALUD (TAPS)',
            15 => 'PASANTE DE PSICOLOGÍA',
            16 => 'PSICÓLOGA(O)',
            19 => 'MÉDICA(O) GENERAL HABILITADA(O) PARA SALUD MENTAL',
            20 => 'LICENCIADA(O) EN ENFERMERÍA Y OBSTETRICIA',
            21 => 'PARTERA(O) TÉCNICA(O)',
            22 => 'PROMOTOR(A) DE SALUD',
            24 => 'MÉDICA(O) ESPECIALISTA HABILITADA(O) PARA SALUD MENTAL',
            25 => 'LICENCIADA(O) EN GERONTOLOGÍA',
            27 => 'PASANTE DE GERONTOLOGÍA',
            29 => 'ACUPUNTURISTA',
            88 => 'OTRO',
        ];

        foreach ($tipos as $id => $descripcion) {
            DB::table('tipos_personal_medico')->insert([
                'id' => $id,
                'descripcion' => $descripcion,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Se insertaron los tipos de personal médico correctamente.');
    }
}
