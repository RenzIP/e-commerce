<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
        ];
    }
}
