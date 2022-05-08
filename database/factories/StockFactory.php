<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "itemName" => Str::random(5),
            "actualStock" => $this->faker->randomNumber(5),
            "minStock" => $this->faker->randomNumber(4),
            "decreasePerWeek" => $this->faker->randomNumber(5),
        ];
    }
}
