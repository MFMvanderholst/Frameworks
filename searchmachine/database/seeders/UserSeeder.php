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
       $this->command->info('preparing seeder ....');

        User::factory()->count(10)->create();

        $this->command->info('preparing has succesfully been done');
    }
}
