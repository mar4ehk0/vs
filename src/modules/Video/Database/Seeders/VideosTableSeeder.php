<?php

namespace Modules\Video\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Video;

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
