<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderHistory>
 */
class OrderHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "itemId" => $this->faker->numberBetween($min = 1, $max = 50),
            "customerId" => $this->faker->numberBetween($min = 1, $max = 50),
            "numOfOrder" => $this->faker->randomNumber(4),
            "totalPrice" => $this->faker->randomNumber(7),

        ];
    }
}
