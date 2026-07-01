<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-900">Pengiriman</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-4">
                <h2 class="font-bold text-lg mb-4">Alamat Pengiriman</h2>
                <textarea wire:model="shippingAddress" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-tokopedia focus:border-tokopedia" placeholder="Masukkan alamat lengkap (Jalan, RT/RW, Kecamatan, Kota, Kode Pos)"></textarea>
                @error('shippingAddress') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="font-bold text-lg mb-4">Daftar Pesanan</h2>
                @foreach($cart->items as $item)
                <div class="flex mb-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">
                    <img src="{{ $item->product->images->first()?->image_path ?? 'https://via.placeholder.com/100' }}" class="w-16 h-16 object-cover rounded">
                    <div class="ml-4 flex-grow">
                        <h3 class="text-gray-800 text-sm">{{ $item->product->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                        <p class="font-bold mt-1 text-sm">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sticky top-24">
                <h3 class="font-bold text-lg mb-4">Ringkasan Belanja</h3>
                <div class="flex justify-between mb-2 text-gray-600">
                    <span>Total Harga ({{ $cart->items->sum('quantity') }} barang)</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-2 text-gray-600">
                    <span>Total Ongkos Kirim</span>
                    <span>Rp 20.000</span>
                </div>
                <hr class="my-4 border-gray-200">
                <div class="flex justify-between mb-6">
                    <span class="font-bold text-lg">Total Tagihan</span>
                    <span class="font-bold text-lg text-tokopedia">Rp {{ number_format($total + 20000, 0, ',', '.') }}</span>
                </div>
                <button wire:click="processCheckout" class="w-full bg-tokopedia hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg">Pilih Pembayaran</button>
            </div>
        </div>
    </div>
</div>