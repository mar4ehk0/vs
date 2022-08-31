<?php

namespace Modules\Source\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Models\Format;
use Infrastructure\Models\Source;
use Infrastructure\Models\Video;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\Source>
 */
class SourceFactory extends Factory
{

    protected $model = Source::class;

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
