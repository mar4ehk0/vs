<?php

namespace Modules\Person\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Person;

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
