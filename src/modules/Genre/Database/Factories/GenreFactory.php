<?php

namespace Modules\Genre\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\Genre>
 */
class GenreFactory extends Factory
{

    protected $model = Genre::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->md5,
        ];
    }
}
