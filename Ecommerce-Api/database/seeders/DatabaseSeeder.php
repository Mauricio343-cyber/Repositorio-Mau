<?php

namespace Database\Seeders;

use App\Models\products;
use App\Models\orders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => fake()->unique()->safeEmail(),
        ]);
        User::factory(10)->create();


        orders::factory()->create([
            'user_id' => orders::factory(),
            'total_price' => rand(10, 100),
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
        ]);
        orders::factory(10)->create();
       
        products::factory()->create([
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(1, 1000),
            'stock' => fake()->numberBetween(1, 100),
        ]);
        products::factory(10)->create();


    }
}
