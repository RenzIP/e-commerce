<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Services\CartService;

class ProductDetail extends Component
{
    public Product $product;
    public $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product->load(['shop', 'images', 'category']);
    }

    public function addToCart(CartService $cartService)
    {
        $cartService->addToCart($this->product, $this->quantity);
        $this->dispatch('cartUpdated');
        session()->flash('message', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function increment() { $this->quantity++; }
    public function decrement() { if ($this->quantity > 1) $this->quantity--; }

    public function render()
    {
        return view('livewire.product-detail')->layout('layouts.app');
    }
}