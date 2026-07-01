<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function mock(Order $order)
    {
        return view('payment.mock', compact('order'));
    }

    public function process(Order $order)
    {
        $order->update(['status' => 'paid', 'payment_status' => 'success']);
        Payment::create([
            'order_id' => $order->id,
            'payment_method' => 'mock_midtrans',
            'transaction_id' => uniqid('TRX-'),
            'status' => 'success',
            'amount' => $order->total_amount,
        ]);

        return redirect()->route('home')->with('message', 'Pembayaran berhasil! Pesanan diproses.');
    }
}