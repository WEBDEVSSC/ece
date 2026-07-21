<?php

namespace Database\Seeders;

use App\Models\ServiciosEspecialidadMedico;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(CatTipoPersonalMedicoSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(ServicioEspecialidadMedicoSeeder::class);
       $this->call(ClueSeeder::class);
       $this->call(CatPaisesSeeder::class);
       $this->call(CatEscolaridadSeeder::class);
    }
}
