<?php

namespace Modules\VideoService\Database\Factories;

use Modules\VideoService\Models\Format;
use Modules\VideoService\Models\Source;
use Modules\VideoService\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\Source>
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
