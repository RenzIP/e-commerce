<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Product Image -->
            <div class="col-span-1">
                <img src="{{ $product->images->first()?->image_path ?? 'https://via.placeholder.com/600' }}" alt="{{ $product->name }}" class="w-full rounded-lg object-cover">
            </div>

            <!-- Product Info -->
            <div class="col-span-1 md:col-span-1 space-y-4">
                <h1 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h1>
                <div class="flex items-center text-sm">
                    <span class="text-gray-500">Terjual 100+</span>
                    <span class="mx-2 text-gray-300">•</span>
                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="text-gray-700">4.9 (50 Ulasan)</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                <div class="border-t border-b border-gray-200 py-4">
                    <h3 class="text-tokopedia font-bold flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        {{ $product->shop->name }}
                    </h3>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-2">Detail Produk</h3>
                    <p class="text-gray-600 text-sm whitespace-pre-wrap">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Action Card -->
            <div class="col-span-1">
                <div class="border border-gray-200 rounded-lg p-4 shadow-sm sticky top-24">
                    <h3 class="font-bold mb-4">Atur jumlah dan catatan</h3>
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex items-center border border-gray-300 rounded-md">
                            <button wire:click="decrement" class="px-3 py-1 text-tokopedia hover:bg-green-50 font-bold">-</button>
                            <span class="px-4 border-x border-gray-300 py-1">{{ $quantity }}</span>
                            <button wire:click="increment" class="px-3 py-1 text-tokopedia hover:bg-green-50 font-bold">+</button>
                        </div>
                        <span class="text-sm text-gray-500">Stok: <span class="font-bold text-gray-900">{{ $product->stock }}</span></span>
                    </div>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-bold text-lg">Rp {{ number_format($product->price * $quantity, 0, ',', '.') }}</span>
                    </div>

                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif

                    <div class="space-y-3">
                        <button wire:click="addToCart" class="w-full bg-tokopedia hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">+ Keranjang</button>
                        <button class="w-full border border-tokopedia text-tokopedia font-bold py-2 px-4 rounded-lg hover:bg-green-50">Beli Langsung</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>