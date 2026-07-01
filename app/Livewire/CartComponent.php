<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Models\CartItem;

class CartComponent extends Component
{
    public $cart;

    public function mount(CartService $cartService)
    {
        $this->cart = $cartService->getCart()->load('items.product.shop');
    }

    public function increment(CartItem $item)
    {
        $item->quantity++;
        $item->save();
        $this->cart->load('items.product.shop');
        $this->dispatch('cartUpdated');
    }

    public function decrement(CartItem $item)
    {
        if ($item->quantity > 1) {
            $item->quantity--;
            $item->save();
        } else {
            $item->delete();
        }
        $this->cart->load('items.product.shop');
        $this->dispatch('cartUpdated');
    }
    
    public function remove(CartItem $item)
    {
        $item->delete();
        $this->cart->load('items.product.shop');
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $total = $this->cart->items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('livewire.cart-component', ['total' => $total])->layout('layouts.app');
    }
}