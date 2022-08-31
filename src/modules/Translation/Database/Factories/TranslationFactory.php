<?php

namespace Modules\Translation\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Models\Translation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\Translation>
 */
class TranslationFactory extends Factory
{

    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
        ];
    }
}
