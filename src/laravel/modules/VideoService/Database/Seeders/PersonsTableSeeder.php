<?php

namespace Modules\VideoService\Database\Seeders;

use Modules\VideoService\Models\Person;
use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory(20)->create()
            ->each(fn(Person $person) => add_media_to_model($person, get_img_directory()));
    }
}
