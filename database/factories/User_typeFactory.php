<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_type>
 */
class User_typeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => "Admin",
            'permission' => "test",
            'active' => true,
            // 'type' => $this->faker->randomElement($array = array ('Admin','user','client')),
            // 'permission' => Str::random(10),
            // 'active' => $this->faker->boolean(),
        ];
    }
}
