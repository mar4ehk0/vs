<?php

namespace Modules\VideoService\Database\Seeders;

use Modules\VideoService\Models\GenreVideo;
use Illuminate\Database\Seeder;

class GenreVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GenreVideo::factory(150)->create();
    }
}
