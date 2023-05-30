<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hobbie>
 */
class HobbieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('pt_BR');
        $hobbies = [
            'Futebol',
            'Leitura',
            'Música',
            'Artesanato',
            'Cozinhar',
        ];

        return [
            //
            'name' => $faker->randomElement($hobbies),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
