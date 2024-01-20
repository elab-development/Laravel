<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projection>
 */
class ProjectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price'=>$this->faker->randomFloat(2,500,1400),
            'air_date'=>$this->faker->dateTimeThisYear(),
            'movie_id'=>$this->faker->numberBetween(1,13),
            'hall_id'=>$this->faker->numberBetween(1,3)
        ];
    }
}
