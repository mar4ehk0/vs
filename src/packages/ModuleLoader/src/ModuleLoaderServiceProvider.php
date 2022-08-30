<?php

namespace Mar4ehk0\ModuleLoader;

use DirectoryIterator;
use Illuminate\Support\ServiceProvider;


class ModuleLoaderServiceProvider extends ServiceProvider
{

    private string $modulesPath;
    private array $modulesName;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->modulesPath = getenv('LARAVEL_PATH') . '/modules';
        $this->modulesName = $this->getFolderModules($this->modulesPath);
    }

    public function register()
    {

    }

    public function boot(): void
    {
        $this->bootAlways();

        if ($this->app->runningInConsole()) {
            $this->registerPublishables();
        }
    }

    protected function bootAlways(): void
    {
        foreach ($this->modulesName as $moduleName) {
            $this->bootRoutes($moduleName);
            $this->bootViews($moduleName);
        }
    }

    private function bootRoutes(string $moduleName): void
    {
        $path = $this->modulesPath . '/' . $moduleName . '/Routes/web.php';
        $this->loadRoutesFrom($path);
    }

    private function bootViews(string $moduleName): void
    {
        $path = $this->modulesPath . '/' . $moduleName . '/Resources/Views';
        $this->loadViewsFrom($path, strtolower($moduleName));
    }


    protected function registerPublishables(): void
    {
        foreach ($this->modulesName as $moduleName) {
            $this->publishesMigrations($moduleName);
            $this->publishesViews($moduleName);
        }
    }

    private function publishesMigrations(string $moduleName): void
    {
        $class = 'Modules\\' . $moduleName . '\Database\Migrations\StructMigration';
        if (class_exists($class)) {
            $listMigration = call_user_func([$class, 'getMigrations']);
            foreach ($listMigration as $className => $stubName) {
                if (!class_exists($className)) {
                    $source =  $this->modulesPath . '/' . $moduleName . '/Database/Migrations/' . $stubName;
                    $destination = database_path(
                        'migrations/' . date('Y_m_d_His') . '_' .
                        str_replace('.stub', '', $stubName)
                    );
                    $this->publishes([$source => $destination], 'migrations');
                }
            }
        }
    }

    private function publishesViews(string $moduleName): void
    {
        $source = $this->modulesPath . '/' . $moduleName . '/Resources/Views';
        $destination = resource_path('views/vendor/' . strtolower($moduleName));

        $this->publishes([$source => $destination], 'views');
    }

    private function getFolderModules(string $modulesPath): array
    {
        $result = [];

        foreach (new DirectoryIterator($modulesPath) as $fileInfo) {
            if ($fileInfo->isDot() || $fileInfo->isFile()) {
                continue;
            }
            $result[] = $fileInfo->getFilename();
        }

        return $result;
    }

}
