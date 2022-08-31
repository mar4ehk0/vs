<?php

namespace Modules\PersonVideo\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\PersonVideo;

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
