<?php

namespace Database\Helpers;

use App\Models\interfaces\ModelMediaInterface;
use App\Providers\PicsumImage;
use Faker\Generator;
use File;

class Image
{
    public static function getDirectory(): string
    {
        $filepath = storage_path('faker_photo');
        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        }
        return $filepath;
    }

    public static function create(Generator $faker): void
    {
        $filePath = self::getDirectory();
        $faker->addProvider(new PicsumImage($faker));
        $faker->image($filePath);
    }

    public static function addMediaToModel(ModelMediaInterface $model): void
    {
        $path = self::getDirectory();
        $path .= '/' . scandir($path)[2];
        $model->addMedia($path)->toMediaCollection($model->getNameMediaCollection());
    }
}
