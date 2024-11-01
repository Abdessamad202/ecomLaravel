<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            "name"=> fake()->name(),
            "price"=> fake()->numberBetween(1,50),
            "discount"=> fake()->numberBetween(1,90),
            "category_id"=> fake()->numberBetween(1,3),
            "image" => "products/" . fake()->numberBetween(1,5).".jpg",
            "description"=> fake()->paragraph(),
            //
        ];
    }
}
