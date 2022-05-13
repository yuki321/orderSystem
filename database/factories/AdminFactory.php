<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // "userId" => Admin::factory()
            // ->has(User::factory()->$this->faker->randomNumber(3))
            // ->create(),
            'userId' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
            "adminName" => $this->faker->name(),
            "admin" => $this->faker->randomNumber(1)
        ];
    }
}
