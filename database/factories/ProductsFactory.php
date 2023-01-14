<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'serial_number' => fake()->unique()->randomNumber(),
            'description' => fake()->text(50),
            'price' => fake()->randomFloat(2, 0, 1000),
            'quantity' => fake()->randomNumber(2),
            'featured' => fake()->boolean(),
        ];
    }

}
