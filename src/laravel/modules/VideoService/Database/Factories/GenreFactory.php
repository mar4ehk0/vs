<?php

namespace Modules\VideoService\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\VideoService\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\Genre>
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
