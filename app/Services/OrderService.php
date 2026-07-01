<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrderFromCart(Cart $cart, array $shippingDetails): Order
    {
        return DB::transaction(function () use ($cart, $shippingDetails) {
            $total = $cart->items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $order = Order::create([
                'user_id' => $cart->user_id,
                'total_amount' => $total,
                'shipping_address' => json_encode($shippingDetails),
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'shop_id' => $item->product->shop_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $cart->items()->delete();

            return $order;
        });
    }
}
