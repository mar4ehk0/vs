<?php

namespace Modules\GenreVideo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Database\Factories\Traits\Unique;
use Infrastructure\Models\Genre;
use Infrastructure\Models\GenreVideo;
use Infrastructure\Models\Video;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\GenreVideo>
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
