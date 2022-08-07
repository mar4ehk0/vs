<?php

namespace Database\Seeders;

use App\Models\Person;
use Database\Factories\PersonFactory;
use Database\Helpers\Image;
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
        for($i = 0; $i < 20; $i++) {
            $person = Person::factory()->create();
            Image::addMediaToModel($person);
        }
    }
}
