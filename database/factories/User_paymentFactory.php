<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_payment>
 */
class User_paymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'payment_type' => $this->faker->creditCardType(),
            'provider' => 'jh',
            'account_no' => $this->faker->creditCardNumber(),
            'expiry_date' => $this->faker->creditCardExpirationDate(),
        ];
    }
}
