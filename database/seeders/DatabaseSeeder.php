<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hobbie;
use App\Models\State;
use App\Models\City;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StateSeeder::class);
        $this->call(HobbieSeeder::class);
        $this->call(CitySeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@admin.com',
            'password' => 'password123'
        ]);
    }
}
