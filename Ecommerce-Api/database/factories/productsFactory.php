<?php

namespace Database\Factories;
 
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'descrption' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
