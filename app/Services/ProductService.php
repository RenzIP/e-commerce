<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getActiveProducts()
    {
        return Product::with(['category', 'images', 'shop'])
            ->where('is_active', true)
            ->paginate(12);
    }
}
