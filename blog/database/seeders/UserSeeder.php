<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Updating new seed ...');

        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);
        User::create([
            'id' => 2,
            'name' => 'Maurits',
            'email' => 'lolligesmaus@gmail.com',
            'password' => 'password'
        ]);

        User::factory()->count(5)->create();

        $this->command->info('Users completed');
    }
}
