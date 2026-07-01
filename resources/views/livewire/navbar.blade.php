<nav class="bg-white border-b border-gray-100 fixed w-full top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-tokopedia">
                    Tokoclone
                </a>
                <div class="hidden sm:block ml-8 text-sm text-gray-500 hover:bg-gray-100 px-3 py-2 rounded-md cursor-pointer">
                    Kategori
                </div>
            </div>
            
            <div class="flex-1 max-w-2xl mx-8">
                <div class="relative w-full">
                    <input type="text" class="w-full border border-gray-300 rounded-lg pl-4 pr-10 py-2 focus:outline-none focus:border-tokopedia focus:ring-1 focus:ring-tokopedia" placeholder="Cari di Tokoclone...">
                    <button class="absolute right-3 top-2.5 text-gray-400 bg-gray-100 px-2 rounded">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <a href="/cart" class="text-gray-500 hover:text-gray-700 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute -top-1 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-4 w-4 flex items-center justify-center">{{ $cartCount }}</span>
                </a>
                
                <div class="h-6 w-px bg-gray-300"></div>

                @auth
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">Dashboard</a>
                        <button wire:click="logout" class="text-sm text-gray-600 hover:text-gray-900">Log Out</button>
                    </div>
                @else
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="text-sm text-tokopedia border border-tokopedia px-4 py-1.5 rounded-lg font-semibold hover:bg-green-50">Masuk</a>
                        <a href="{{ route('register') }}" class="text-sm text-white bg-tokopedia px-4 py-1.5 rounded-lg font-semibold hover:bg-green-600">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>