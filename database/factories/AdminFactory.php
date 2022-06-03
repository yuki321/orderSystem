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
        $random_num = [
            1, 2, 4, 3, 5, 6, 7
        ];
        return [
            'userId' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
            "adminName" => $this->faker->name(),
            "admin" => $this->faker->randomElement($random_num),
        ];
    }
}
