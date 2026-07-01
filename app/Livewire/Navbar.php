<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $cartCount = 0;

    public function mount(CartService $cartService)
    {
        $this->updateCartCount($cartService);
    }

    #[On('cartUpdated')]
    public function updateCartCount(CartService $cartService)
    {
        $this->cartCount = $cartService->getCart()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}