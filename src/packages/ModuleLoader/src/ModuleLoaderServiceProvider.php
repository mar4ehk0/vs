<?php

namespace Mar4ehk0\ModuleLoader;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class ModuleLoaderServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        var_dump(static::$publishGroups);
    }

}
