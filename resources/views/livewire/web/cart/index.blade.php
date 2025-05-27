<div class="container mx-auto mt-6">
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    {{-- <th scope="col" class="px-4 py-3"><input type="checkbox" /></th> --}}
                    <th scope="col" class="px-4 py-3">Produk</th>
                    <th scope="col" class="px-4 py-3">Harga Satuan</th>
                    <th scope="col" class="px-4 py-3">Kuantitas</th>
                    <th scope="col" class="px-4 py-3">Total Harga</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keranjangs as $keranjang)
                <tr class="bg-white border-b">
                    <td class="px-4 py-3">
                        <input type="checkbox" />
                    </td>
                    <td class="flex items-center px-4 py-4 space-x-3">
                        <img src="{{ $keranjang->produk->linkgambar }}" class="w-20 h-20 object-cover rounded" />
                        <span>{{ $keranjang->produk->nama_produk }}</span>
                    </td>
                    <td class="px-4 py-4 text-orange-600 font-semibold">Rp. {{ number_format($keranjang->produk->harga) }}</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            <livewire:web.cart.btn-decrement :id="$keranjang->id" :id_produk="$keranjang->id_produk" :disabled="$keranjang->jumlah_beli" />
                            <input type="number" value="{{ $keranjang->jumlah_beli }}" class="w-12 text-center border rounded" readonly />
                            <livewire:web.cart.btn-increment :id="$keranjang->id" :id_produk="$keranjang->id_produk" />
                        </div>
                    </td>
                    <td class="px-4 py-4 text-orange-600 font-semibold">
                        Rp. {{ number_format($keranjang->produk->harga * $keranjang->jumlah_beli) }}
                    </td>
                    <td class="px-4 py-4 text-red-500">
                        <livewire:web.cart.btn-delete :id="$keranjang->id" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 font-semibold text-gray-600">Tidak ada produk dalam keranjang</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

   @if(count($keranjangs) > 0)
<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-md z-50 px-4 py-3 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        {{-- <input type="checkbox" />
        <span class="text-sm text-gray-600 cursor-pointer">Pilih Semua</span>
        <span class="text-red-500 cursor-pointer">Hapus</span> --}}
    </div>
    <div class="text-right space-y-1 text-sm">
        <div>
            <span class="font-medium">Total ({{ count($keranjangs) }} produk):</span>
            <span class="text-orange-600 font-bold">Rp. {{ number_format($totalPrice) }}</span>
        </div>
        <a href="/checkout" wire:navigate class="block text-center text-white px-6 py-2 rounded shadow" style="background-color: orange">
    CheckOut
</a>
    </div>
</div>
@endif
