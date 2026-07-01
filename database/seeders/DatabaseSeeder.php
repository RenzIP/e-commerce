<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => Role::ADMIN,
        ]);

        // Seller
        $seller = User::factory()->create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'role' => Role::SELLER,
        ]);

        $shop = Shop::factory()->create([
            'user_id' => $seller->id,
            'name' => 'Tokopedia Store',
        ]);

        // Customer
        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => Role::CUSTOMER,
        ]);

        // Categories
        $categories = Category::factory()->count(20)->create();

        // Products
        foreach ($categories as $category) {
            Product::factory()->count(3)->create([
                'shop_id' => $shop->id,
                'category_id' => $category->id,
            ])->each(function ($product) {
                ProductImage::factory()->create([
                    'product_id' => $product->id,
                    'is_primary' => true,
                ]);
            });
        }
    }
}
