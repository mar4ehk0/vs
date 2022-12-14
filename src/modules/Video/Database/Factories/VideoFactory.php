<?php

namespace Modules\Video\Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Models\Translation;
use Infrastructure\Models\Type;
use Infrastructure\Models\Video;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\Video>
 */
class VideoFactory extends Factory
{

    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        create_image($this->faker, get_img_directory());

        return [
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentences(4, true),
            'year' => $this->faker->dateTimeBetween('-30 years', '-1 year'),
            'duration' => random_int(3600, 10800),
            'country' => $this->faker->countryCode(),
            'age_limit' => random_int(0, 18),
            'translation_id' => Translation::inRandomOrder()->first(['id']),
            'type' => Arr::random(Type::cases()),
        ];
    }
}
