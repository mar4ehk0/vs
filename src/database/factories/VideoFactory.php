<?php

namespace Database\Factories;

use App\Models\Translation;
use App\Models\Video;
use Arr;
use Database\Helpers\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
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
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentences(4, true),
            'year' => $this->faker->dateTimeBetween('-30 years', '-1 year'),
            'duration' => random_int(3600, 10800),
            'country' => $this->faker->countryCode(),
            'age_limit' => random_int(0, 18),
            'translation_id' => Arr::random(Translation::all()->pluck('id')->toArray()),
            'type' => Arr::random(array_keys(Video::getTypes())),
        ];
    }
}
