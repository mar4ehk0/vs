<?php

namespace Modules\VideoService\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\VideoService\Models\Position;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\VideoService\Models\Position>
 */
class PositionFactory extends Factory
{

    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'name' => $this->faker->word()
        ];
    }
}
