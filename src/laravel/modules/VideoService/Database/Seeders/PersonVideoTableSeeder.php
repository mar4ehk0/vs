<?php

namespace Modules\VideoService\Database\Seeders;

use Modules\VideoService\Models\PersonVideo;
use Illuminate\Database\Seeder;

class PersonVideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonVideo::factory(150)->create();
    }
}
