<?php

namespace Modules\VideoService;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class VideoServiceProvider extends ServiceProvider
{

    private const MIGRATIONS = [
        'CreateFormatsTable' => 'create_formats_table.php.stub',
        'CreateGenreVideoTable' => 'create_genre_video_table.php.stub',
        'CreateGenresTable' => 'create_genres_table.php.stub',
        'CreatePersonVideoTable' => 'create_person_video_table.php.stub',
        'CreatePersonsTable' => 'create_persons_table.php.stub',
        'CreatePositionsTable' => 'create_positions_table.php.stub',
        'CreateSourcesTable' => 'create_sources_table.php.stub',
        'CreateTranslationsTable' => 'create_translations_table.php.stub',
        'CreateVideosTable' => 'create_videos_table.php.stub',
    ];

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->bootRoutes();

        $this->loadViewsFrom(__DIR__ . '/Resources/Views', 'videoservice');

        if ($this->app->runningInConsole()) {
            $this->bootMigrations();

//            $this->publishes([
//                __DIR__.'/../resources/views' => resource_path('views/vendor/blogpackage'),
//            ], 'views');
//
//            $this->publishes([
//                __DIR__.'/../resources/assets' => public_path('blogpackage'),
//            ], 'assets');
        }


        var_dump(static::$publishGroups);
    }

    private function bootRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        });
    }

    private function routeConfiguration(): array
    {
        return [
//            'prefix' =>
//            'middleware' =>
        ];
    }

    private function bootMigrations(): void
    {
        foreach (self::MIGRATIONS as $className => $stubName) {
            if (!class_exists($className)) {
                $pathStub =  __DIR__ . '/Database/Migrations/' . $stubName;
                $sourceName = str_replace('.stub', '', $stubName);
                $this->publishes([
                    $pathStub => database_path('migrations/' . date('Y_m_d_His') . '_' . $sourceName),
                ], 'migrations');
            }
        }
    }


}
