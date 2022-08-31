<?php

namespace Modules\Position\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Актер'],
            ['name' => 'Режисер'],
            ['name' => 'Оператор'],
            ['name' => 'Композитор'],
            ['name' => 'Консультант'],
            ['name' => 'Редактор'],
            ['name' => 'Кастинг'],
            ['name' => 'Дублер'],
        ];

        Position::factory(count($data))->sequence(fn ($sequence) => $data[$sequence->index])->create();
    }
}
