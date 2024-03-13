<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure to import the correct User model

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'lessor',
            'email' => 'lessor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ])->assignRole('lessor');
    }
}
