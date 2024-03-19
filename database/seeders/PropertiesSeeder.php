<?php

namespace Database\Seeders;

use App\Properties;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users
        $users = User::all();

        // Seed properties for each user
        foreach ($users as $user) {
            $user->properties()->create([
                'building_unit' => 'Building Unit ' . $user->id,
                'lot' => 'LOT ' . $user->id,
                'block' => 'BLOCK ' . $user->id,
                'subdivision' => 'SUDVISION ' . $user->id,
                'barangay' => 'BARANGAY ' . $user->id,
                'city_town' => 'CITY/TOWN ' . $user->id,
                'province' => 'PROVINCE ' . $user->id,
                'region' => 'REGION ' . $user->id,
                'country' => 'COUNTRY ' . $user->id,
                'property_description' => 'PROPERTY DESCRIPTION ' . $user->id,
            ]);
        }
    }
}
