<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-900">Keranjang</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="col-span-2">
            @forelse($cart->items as $item)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-4">
                <div class="flex items-center mb-3 pb-3 border-b border-gray-100">
                    <svg class="w-5 h-5 mr-2 text-tokopedia" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="font-bold">{{ $item->product->shop->name ?? 'Toko' }}</span>
                </div>
                <div class="flex">
                    <img src="{{ $item->product->images->first()?->image_path ?? 'https://via.placeholder.com/150' }}" class="w-20 h-20 object-cover rounded">
                    <div class="ml-4 flex-grow">
                        <h3 class="text-gray-800">{{ $item->product->name }}</h3>
                        <p class="font-bold mt-1">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="flex justify-end items-center mt-4">
                    <button wire:click="remove({{ $item->id }})" class="text-gray-400 hover:text-red-500 mr-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                    <div class="flex items-center border border-gray-300 rounded-md">
                        <button wire:click="decrement({{ $item->id }})" class="px-3 py-1 text-tokopedia hover:bg-green-50 font-bold">-</button>
                        <span class="px-4 border-x border-gray-300 py-1 text-sm">{{ $item->quantity }}</span>
                        <button wire:click="increment({{ $item->id }})" class="px-3 py-1 text-tokopedia hover:bg-green-50 font-bold">+</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                <img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/6a568b20.png" class="w-48 mx-auto mb-4">
                <h2 class="font-bold text-xl mb-2">Wah, keranjang belanjamu kosong</h2>
                <p class="text-gray-500 mb-4">Yuk, isi dengan barang-barang impianmu!</p>
                <a href="/" class="bg-tokopedia text-white px-6 py-2 rounded-lg font-bold hover:bg-green-600">Mulai Belanja</a>
            </div>
            @endforelse
        </div>

        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sticky top-24">
                <h3 class="font-bold text-lg mb-4">Ringkasan Belanja</h3>
                <div class="flex justify-between mb-2 text-gray-600">
                    <span>Total Harga ({{ $cart->items->sum('quantity') }} barang)</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <hr class="my-4 border-gray-200">
                <div class="flex justify-between mb-6">
                    <span class="font-bold text-lg">Total Harga</span>
                    <span class="font-bold text-lg text-tokopedia">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <a href="/checkout" class="block text-center w-full bg-tokopedia hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg {{ $cart->items->count() === 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">Beli ({{ $cart->items->sum('quantity') }})</a>
            </div>
        </div>
    </div>
</div>