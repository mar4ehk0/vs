<?php

namespace Modules\VideoService\Database\Seeders;

use Modules\VideoService\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Профессиональный  (многоголосый закадровый)'],
            ['name' => 'Профессиональный (двухголосый закадровый)'],
            ['name' => 'Профессиональный (дублированный)'],
            ['name' => 'Одноголосый закадровый'],
            ['name' => 'Субтитры'],
            ['name' => 'Авторский (одноголосый закадровый)'],
        ];

        Translation::factory(count($data))->sequence(fn ($sequence) => $data[$sequence->index])->create();
    }
}
