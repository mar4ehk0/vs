<?php

use App\Models\interfaces\ModelMediaInterface;
use App\Providers\PicsumImage;
use Faker\Generator;

if (!function_exists('get_img_directory')) {
    function get_img_directory(): string
    {
        $filepath = storage_path('faker_photo');
        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        }
        return $filepath;
    }
}

if (!function_exists('create_image')) {
    function create_image(Generator $faker, string $filePath): void
    {
        $faker->addProvider(new PicsumImage($faker));
        $faker->image($filePath);
    }
}

if (!function_exists('add_media_to_model')) {
    function add_media_to_model(ModelMediaInterface $model, string $filePath): void
    {
        $filePath .= '/' . scandir($filePath)[2];
        $model->addMedia($filePath)->toMediaCollection($model->getNameMediaCollection());
    }
}
