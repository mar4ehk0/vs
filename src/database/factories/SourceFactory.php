<?php

namespace Database\Factories;

use App\Models\Format;
use App\Models\Video;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Source>
 */
class SourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'video_id' => Arr::random(Video::all()->pluck('id')->toArray()),
            'format_id' => Arr::random(Format::all()->pluck('id')->toArray()),
            'source_path' => $this->faker->filePath(),
        ];
    }
}
