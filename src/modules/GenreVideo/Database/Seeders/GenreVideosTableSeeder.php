<?php

namespace Modules\GenreVideo\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\GenreVideo;

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
