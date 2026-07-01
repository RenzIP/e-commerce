<x-app-layout>
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Mock Payment Gateway (Midtrans)</h1>
            <p class="text-gray-600 mb-8">Silakan lakukan pembayaran sebesar <span class="font-bold text-lg">Rp {{ number_format($order->total_amount + 20000, 0, ',', '.') }}</span></p>
            
            <form action="{{ route('payment.process', $order) }}" method="POST">
                @csrf
                <button type="submit" class="bg-tokopedia text-white font-bold py-3 px-8 rounded-lg hover:bg-green-600">Bayar Sekarang (Simulasi Sukses)</button>
            </form>
        </div>
    </div>
</x-app-layout>