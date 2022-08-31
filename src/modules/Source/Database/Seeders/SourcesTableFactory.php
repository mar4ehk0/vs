<?php

namespace Modules\Source\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Source;

class SourcesTableFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::factory(100)->create();
    }
}
