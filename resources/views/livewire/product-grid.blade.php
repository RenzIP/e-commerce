<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Rekomendasi untukmu</h2>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($products as $product)
        <a href="/product/{{ $product->id }}" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow cursor-pointer flex flex-col h-full">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
                <img src="{{ $product->images->first()?->image_path ?? 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            </div>
            <div class="p-3 flex flex-col flex-grow">
                <h3 class="text-sm text-gray-700 line-clamp-2">{{ $product->name }}</h3>
                <p class="mt-1 font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="text-xs text-gray-500 mt-1 flex items-center space-x-1">
                    <svg class="w-3 h-3 text-tokopedia" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="truncate">{{ $product->shop->name ?? 'Toko' }}</span>
                </div>
                <div class="mt-auto pt-2 flex items-center text-xs text-gray-500">
                    <svg class="w-3.5 h-3.5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span>4.9</span>
                    <span class="mx-1">•</span>
                    <span>Terjual 100+</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>