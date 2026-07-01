<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'shop_id' => \App\Models\Shop::factory(),
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(10, 500),
            'is_active' => true,
        ];
    }
}
