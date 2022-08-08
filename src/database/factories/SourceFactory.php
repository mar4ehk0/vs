<?php

namespace Database\Factories;

use App\Models\Format;
use App\Models\Video;
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
            'video_id' => Video::inRandomOrder()->first(['id']),
            'format_id' => Format::inRandomOrder()->first(['id']),
            'source_path' => $this->faker->filePath(),
        ];
    }
}
