<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Format\Database\Seeders\FormatsTableSeeder;
use Modules\Genre\Database\Seeders\GenresTableSeeder;
use Modules\GenreVideo\Database\Seeders\GenreVideosTableSeeder;
use Modules\Person\Database\Seeders\PersonsTableSeeder;
use Modules\PersonVideo\Database\Seeders\PersonVideoTableSeeder;
use Modules\Position\Database\Seeders\PositionsTableSeeder;
use Modules\Source\Database\Seeders\SourcesTableFactory;
use Modules\Translation\Database\Seeders\TranslationsTableSeeder;
use Modules\Video\Database\Seeders\VideosTableSeeder;

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
        $this->call(PersonsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(SourcesTableFactory::class);
        $this->call(PersonVideoTableSeeder::class);
        $this->call(GenreVideosTableSeeder::class);
    }
}
