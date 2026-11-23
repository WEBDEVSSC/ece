<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioEspecialidadMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $servicios = [
            'CONSULTA GENERAL',
            'PEDIATRÍA',
            'GINECOLOGÍA Y OBSTETRICIA',
            'MEDICINA INTERNA',
            'CIRUGÍA GENERAL',
            'PSIQUIATRÍA',
            'TRAUMATOLOGÍA Y ORTOPEDIA',
            'ODONTOLOGÍA',
            'URGENCIAS',
            'NUTRICIÓN',
            'PSICOLOGÍA',
            'MEDICINA PREVENTIVA',
            'DERMATOLOGÍA',
            'GERIATRÍA',
            'OTORRINOLARINGOLOGÍA',
            'OFTALMOLOGÍA',
            'UROLOGÍA',
            'REHABILITACIÓN',
            'ANESTESIOLOGÍA',
            'EPIDEMIOLOGÍA',
            'TRABAJO SOCIAL',
            'PROMOCIÓN DE LA SALUD',
            'ENFERMERÍA GENERAL',
            'ENFERMERÍA ESPECIALIZADA',
            'ONCOLOGÍA MEDICA',
            'ONCOCIRUGIA',
            'GINEONCOLOGIA',
            'RADIOTERAPIA',
            'HEMATOLOGÍA',
            'ALGOLOGIA',
            'ODONTOLOGIA ONCOLOGICA',
        ];

        foreach ($servicios as $nombre) {
            $existe = DB::table('cat_servicios_especialidad_medicos')
                ->where('especialidad', $nombre)
                ->exists();

            if (!$existe) {
                DB::table('cat_servicios_especialidad_medicos')->insert([
                    'especialidad' => $nombre,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }

        $this->command->info('Servicios/Especialidades nuevos insertados correctamente.');
    }
}
