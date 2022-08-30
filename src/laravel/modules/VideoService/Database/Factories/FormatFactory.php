<?php

namespace Modules\VideoService\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\VideoService\Models\Format;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\Format>
 */
class FormatFactory extends Factory
{

    protected $model = Format::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->title(),
            'type' => fake()->mimeType(),
            'ffmpeg_command' => fake()->sentence(5),
        ];
    }


}
