<?php

namespace Modules\VideoService\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FormatsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(PersonsTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(SourcesTableFactory::class);
        $this->call(GenreVideosTableSeeder::class);
        $this->call(PersonVideoTableSeeder::class);

    }
}
