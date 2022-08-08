<?php

namespace Database\Seeders;

use App\Models\Video;
use Database\Helpers\Image;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory()->count(50)->create()
            ->each(fn(Video $video) => add_media_to_model($video, get_img_directory()));

    }
}
