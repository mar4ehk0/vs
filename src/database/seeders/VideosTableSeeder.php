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
        for($i = 0; $i < 50; $i++) {
            $video = Video::factory()->create();
            Image::addMediaToModel($video);
        }
    }
}
