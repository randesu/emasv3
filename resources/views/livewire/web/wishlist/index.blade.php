<div class="container py-4">
    <h2 class="fw-bold mb-4">Wishlist Saya</h2>

    <form wire:submit.prevent="simpanPerubahan">
        <div class="row row-cols-2 row-cols-md-5 g-4">
            @forelse ($wishlists as $item)
                <div class="col position-relative">
                    <label class="d-block position-relative">
                        <!-- Checkbox bulat kiri atas -->
                        <input type="checkbox" wire:model="selectedWishlists" value="{{ $item->id }}"
                            class="form-check-input position-absolute"
                            style="top: -10px; left: -10px; z-index: 1; width: 24px; height: 24px; border-radius: 50%; background-color: #f5f5f5; border: 2px solid #aaa;">

                        <!-- Kartu Produk -->
                        <div class="card shadow-sm border-0" style="border-radius: 16px; box-shadow: 0 0 12px #ffe9c4;">
                            <img src="{{ $item->produk->linkgambar ?? 'https://via.placeholder.com/150' }}"
                                class="card-img-top"
                                alt="{{ $item->produk->nama_produk }}"
                                style="border-radius: 16px 16px 0 0; height: 140px; object-fit: cover;">
                            <div class="card-body text-center py-3 px-2">
                                <div class="fw-semibold" style="font-size: 14px;">
                                    {{ $item->produk->nama_produk ?? 'Produk tidak ditemukan' }}
                                </div>
                                <div class="text-muted small mb-1">Kategori</div>
                                <div class="text-danger fw-bold" style="font-size: 14px;">
                                    Rp. {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            @empty
                <div class="col">
                    <p>Tidak ada wishlist.</p>
                </div>
            @endforelse
        </div>

        <!-- Bagian bawah: jumlah terpilih & tombol aksi -->
        {{-- <div class="d-flex justify-content-between align-items-center mt-4 px-3 py-2"
             style="background: #f3f3f3; border-top: 2px solid #1976d2;">
            <div class="text-secondary">
                Dipilih {{ count($selectedWishlists) }}/50
            </div>
            <div class="d-flex gap-2">
                <button type="button" wire:click.prevent="hapusFavorit"
                        class="btn btn-outline-warning fw-semibold">
                    Hapus Favorit
                </button>
                <button type="submit" class="btn btn-warning text-white fw-semibold">
                    Simpan Perubahan
                </button>
            </div> --}}
        {{-- </div> --}}
    </form>
</div>
