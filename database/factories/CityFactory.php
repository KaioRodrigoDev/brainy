<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $states = State::all();
        $faker = Faker::create('pt_BR');
        $cities = [];

        foreach ($states as $state) {
            $cities[] = [
                'name' => $faker->city,
                'state_id' => $state->id,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('now', '+1 year'),
            ];
        }

        return $faker->randomElement($cities);
    }
}
