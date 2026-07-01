<?php
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\ProductGrid::class)->name('home');
Route::get('/product/{product}', \App\Livewire\ProductDetail::class)->name('product.detail');
Route::get('/cart', \App\Livewire\CartComponent::class)->name('cart');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/checkout', \App\Livewire\CheckoutComponent::class)->name('checkout');
    Route::get('/payment/mock/{order}', [\App\Http\Controllers\PaymentController::class, 'mock'])->name('payment.mock');
    Route::post('/payment/process/{order}', [\App\Http\Controllers\PaymentController::class, 'process'])->name('payment.process');
});
