<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'SKU' => $this->faker->swiftBicNumber(),
            'product_categorie_id' => $this->faker->randomNumber(),
            'quantity' => $this->faker->numberBetween(1,200),
            'price_buy' => $this->faker->randomFloat(2 , 1.22 , 999.99),
            'price_sell' =>'price_buy' < $this->faker->randomFloat(2 , 1.22 , 999.99),
            'discount_id' => null,
        ];
    }
}
