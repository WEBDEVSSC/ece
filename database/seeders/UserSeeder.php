<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin SSC',
            'email' => 'soportewebssc@gmail.com',
            'password' => Hash::make('Ece1144$'), 
            'clues_id' => '1',
        ]);

        $this->command->info('Se inserto el usuario default correctamente.');
    }
}
