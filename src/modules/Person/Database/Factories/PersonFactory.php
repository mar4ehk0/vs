<?php

namespace Modules\Person\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Models\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\Person>
 */
class PersonFactory extends Factory
{

    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        create_image($this->faker, get_img_directory());

        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthday' => $this->faker->dateTimeBetween('-50 years', '-20 years'),
            'about' => $this->faker->sentences(4, true),
        ];
    }


}
