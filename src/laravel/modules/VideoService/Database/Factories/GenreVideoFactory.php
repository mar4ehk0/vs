<?php

namespace Modules\VideoService\Database\Factories;

use Modules\VideoService\Models\Genre;
use Modules\VideoService\Models\GenreVideo;
use Modules\VideoService\Models\Video;
use Modules\VideoService\Database\Factories\Traits\Unique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\GenreVideo>
 */
class GenreVideoFactory extends Factory
{

    use Unique;

    protected $model = GenreVideo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        while (1) {
            $genre_id = Genre::inRandomOrder()->first(['id']);
            $video_id = Video::inRandomOrder()->first(['id']);

            if ($this->unique($genre_id, $video_id)) {
                break;
            }
        }

        return [
            'genre_id' => $genre_id,
            'video_id' => $video_id,
        ];
    }
}
