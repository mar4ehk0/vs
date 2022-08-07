<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Position;
use App\Models\Video;
use Arr;
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
            $person_id = Arr::random(Person::all()->pluck('id')->toArray());
            $video_id = Arr::random(Video::all()->pluck('id')->toArray());
            $position_id = Arr::random(Position::all()->pluck('id')->toArray());

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
