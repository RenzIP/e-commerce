<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Services\OrderService;

class CheckoutComponent extends Component
{
    public $cart;
    public $shippingAddress = '';

    public function mount(CartService $cartService)
    {
        $this->cart = $cartService->getCart()->load('items.product.shop');
        if ($this->cart->items->isEmpty()) {
            return redirect()->route('home');
        }
    }

    public function processCheckout(OrderService $orderService)
    {
        $this->validate([
            'shippingAddress' => 'required|min:10',
        ]);

        $shippingDetails = ['address' => $this->shippingAddress];
        $order = $orderService->createOrderFromCart($this->cart, $shippingDetails);

        return redirect()->route('payment.mock', ['order' => $order->id]);
    }

    public function render()
    {
        $total = $this->cart->items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('livewire.checkout-component', ['total' => $total])->layout('layouts.app');
    }
}