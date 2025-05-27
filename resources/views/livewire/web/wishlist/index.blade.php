<div>
    <h2 class="text-lg font-bold mb-4">Wishlist Saya</h2>

    @forelse ($wishlists as $item)
        <div class="p-4 border-b">
            <h3 class="text-md font-semibold">
                {{ $item->produk->nama_produk ?? 'Produk tidak ditemukan' }}
            </h3>
            {{-- Tambahkan detail lain jika perlu --}}
        </div>
    @empty
        <p>Tidak ada wishlist.</p>
    @endforelse
</div>
