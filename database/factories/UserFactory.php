<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => "$this->faker->email()",
            'password' => $this->faker->password(),
            'name' => $this->faker->name(),
            'user_type_id' => $this->faker->randomNumber(),
            
        ];
    }
}
