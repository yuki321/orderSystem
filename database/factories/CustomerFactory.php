<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "companyName" => Str::random(10)."株式会社",
            "address" => $this->faker->address(),
            "telNumber" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(20),
            "customerName" => $this->faker->name(),
            "status" => $this->faker->randomElement([0, 1]),
        ];
    }
}
