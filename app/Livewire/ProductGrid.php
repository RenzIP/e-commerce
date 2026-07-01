<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\ProductService;
use Livewire\WithPagination;

class ProductGrid extends Component
{
    use WithPagination;

    public function render(ProductService $productService)
    {
        return view('livewire.product-grid', [
            'products' => $productService->getActiveProducts()
        ])->layout('layouts.app');
    }
}