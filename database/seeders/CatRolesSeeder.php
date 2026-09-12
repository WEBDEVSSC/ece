<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id'          => 1,
                'rol'         => 'root',
                'descripcion' => 'Nivel mas alto con todos los privilegios',
                'created_at'  => '2025-07-21 20:23:23',
                'updated_at'  => '2025-07-21 20:23:23',
            ],
            [
                'id'          => 2,
                'rol'         => 'medicoConsultaExterna',
                'descripcion' => 'Rol asignado a medico de consulta externa',
                'created_at'  => '2025-07-21 20:24:04',
                'updated_at'  => '2025-07-21 20:57:25',
            ],
            [
                'id'          => 3,
                'rol'         => 'recepcion',
                'descripcion' => 'Rol asignado para el modulo de Archivo (recepcion',
                'created_at'  => '2025-07-21 20:58:03',
                'updated_at'  => '2025-07-21 20:58:03',
            ],
            [
                'id'          => 4,
                'rol'         => 'enfermeriaConsultaExterna',
                'descripcion' => 'ENFERMERIA CONSULTA EXTERNA',
                'created_at'  => '2026-07-29 05:30:04',
                'updated_at'  => '2026-07-29 05:30:04',
            ],
            [
                'id'          => 5,
                'rol'         => 'laboratorioConsultaExterna',
                'descripcion' => 'LABORATORIO CONSULTA EXTERNA',
                'created_at'  => '2026-07-29 05:21:15',
                'updated_at'  => '2026-07-29 05:21:15',
            ],
        ];

        foreach ($roles as $rol) {
            DB::table('roles')->updateOrInsert(
                ['id' => $rol['id']],
                $rol
            );
        }

        $this->command->info('¡Seeder CatRolesSeeder ejecutado e insertado correctamente!');
    }
}
