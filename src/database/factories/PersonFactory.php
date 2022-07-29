<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'birthday' => fake()->dateTimeBetween('-50 years', '-20 years'),
            'about' => fake()->sentences(4, true),
            'photo_id' => fake()->filePath()
        ];
    }
}
