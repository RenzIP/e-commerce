<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCart()
    {
        $userId = auth()->id();
        $sessionId = Session::getId();

        if ($userId) {
            return Cart::firstOrCreate(['user_id' => $userId]);
        }

        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    public function addToCart(Product $product, int $quantity = 1)
    {
        $cart = $this->getCart();
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return $cartItem;
    }
}
