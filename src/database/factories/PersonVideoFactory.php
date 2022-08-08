<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Position;
use App\Models\Video;
use Database\Factories\traits\Unique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonVideo>
 */
class PersonVideoFactory extends Factory
{

    use Unique;

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
