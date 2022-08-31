<?php

namespace Modules\Genre\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Экшен'],
            ['name' => 'Приключенческий фильм'],
            ['name' => 'Комедия'],
            ['name' => 'Драма'],
            ['name' => 'Фантастика'],
            ['name' => 'Исторический фильм'],
            ['name' => 'Фильм ужасов'],
            ['name' => 'Триллер'],
            ['name' => 'Вестерн'],
            ['name' => 'Научная фантастика'],
        ];

        Genre::factory(count($data))->sequence(fn ($sequence) => $data[$sequence->index])->create();
    }
}
