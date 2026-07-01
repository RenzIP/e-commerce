<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'image_path' => 'https://via.placeholder.com/600x400',
            'is_primary' => false,
        ];
    }
}
