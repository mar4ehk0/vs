<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Video;
use Database\Factories\traits\Unique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GenreVideoFactory extends Factory
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
