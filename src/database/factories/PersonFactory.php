<?php

namespace Database\Factories;

use Database\Helpers\Image;
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
        Image::create($this->faker);

        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthday' => $this->faker->dateTimeBetween('-50 years', '-20 years'),
            'about' => $this->faker->sentences(4, true),
        ];
    }


}
