<?php

namespace Modules\VideoService\Database\Seeders;

use Modules\VideoService\Models\Source;
use Illuminate\Database\Seeder;

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
