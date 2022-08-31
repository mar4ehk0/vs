<?php

namespace Modules\PersonVideo\Database\Factories;

use Infrastructure\Database\Factories\Traits\Unique;
use Infrastructure\Models\Person;
use Infrastructure\Models\PersonVideo;
use Infrastructure\Models\Position;
use Infrastructure\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\PersonVideo>
 */
class PersonVideoFactory extends Factory
{

    use Unique;

    protected $model = PersonVideo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        while (1) {
            $person_id = Person::inRandomOrder()->first(['id']);
            $video_id = Video::inRandomOrder()->first(['id']);
            $position_id = Position::inRandomOrder()->first(['id']);

            if ($this->unique($person_id, $video_id, $position_id)) {
                break;
            }
        }

        return [
            'person_id' => $person_id,
            'video_id' => $video_id,
            'position_id' => $position_id,
        ];
    }
}
