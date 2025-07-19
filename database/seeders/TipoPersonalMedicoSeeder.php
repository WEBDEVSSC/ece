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
            1 => 'PASANTE DE MEDICINA',
            2 => 'MÉDICO GENERAL',
            3 => 'MÉDICO RESIDENTE',
            4 => 'MÉDICO ESPECIALISTA',
            5 => 'PASANTE DE ENFERMERÍA',
            6 => 'ENFERMERO(A) GENERAL',
            7 => 'ENFERMERO(A) ESPECIALISTA',
            8 => 'TRABAJADOR SOCIAL',
            9 => 'MÉDICO HOMEÓPATA',
            10 => 'MÉDICO TRADICIONAL',
            11 => 'TÉCNICO EN ATENCIÓN PRIMARIA A LA SALUD (TAPS)',
            12 => 'ODONTÓLOGO',
            13 => 'PSICÓLOGO CLÍNICO',
            14 => 'NUTRIÓLOGO',
            15 => 'PROMOTOR DE SALUD',
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
