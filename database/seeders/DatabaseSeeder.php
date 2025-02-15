<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Asti Indah P',
            'role' => 'superuser',
            'foto' => 'Asti Indah P.png',
            'email' => 'astiindahp@gmail.com',
            'password' => bcrypt('password'),
            'jabatan' => 'Administrator',
            'projek' => 'SAKTI',
            'notelp' => '08199828828',
            'alamat' => 'Jl. Cipayung'
        ]);
    }
}
