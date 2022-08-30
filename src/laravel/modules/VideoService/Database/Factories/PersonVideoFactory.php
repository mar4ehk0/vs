<?php

namespace Modules\VideoService\Database\Factories;

use Modules\VideoService\Models\PersonVideo;
use Modules\VideoService\Models\Video;
use Modules\VideoService\Models\Person;
use Modules\VideoService\Models\Position;
use Modules\VideoService\Database\Factories\Traits\Unique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\PersonVideo>
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
