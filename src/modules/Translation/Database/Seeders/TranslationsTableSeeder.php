<?php

namespace Modules\Translation\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Translation;

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
