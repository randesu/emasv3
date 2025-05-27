<div class="container py-4">
    <h2 class="fw-bold mb-4">Wishlist Saya</h2>

  
        <div class="row row-cols-2 row-cols-md-5 g-4">
            @forelse ($wishlists as $item)
                <div class="col position-relative">
                    <label class="d-block position-relative">
                       
                        <!-- Kartu Produk -->
                        <div class="card shadow-sm border-0" style="border-radius: 16px; box-shadow: 0 0 12px #ffe9c4;">
                            <img src="{{ $item->produk->linkgambar ?? 'https://via.placeholder.com/150' }}"
                                class="card-img-top"
                                alt="{{ $item->produk->nama_produk }}"
                                style="border-radius: 16px 16px 0 0; height: 140px; object-fit: cover;">

                            <div class="card-body text-center py-3 px-2" style="min-height: 140px;">
                                <a href="/products/{{ $item->produk->slug }}"
                                    class="fw-semibold text-decoration-none text-dark d-block mb-1"
                                    style="font-size: 14px; line-height: 1.2em; height: 3.6em; overflow: hidden;">
                                    {{ $item->produk->nama_produk ?? 'Produk tidak ditemukan' }}
                                </a>
                                <div class="text-muted small mb-1">{{ $item->produk->category->name }}</div>
                                <div class="text-danger fw-bold" style="font-size: 14px;">
                                    Rp. {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}
                                </div>
                            </div>

                            <livewire:web.wishlist.delete-wishlist :id="$item->id" />
                        </div>



                        {{-- <div class="card shadow-sm border-0" style="border-radius: 16px; box-shadow: 0 0 12px #ffe9c4;">
                            <img src="{{ $item->produk->linkgambar ?? 'https://via.placeholder.com/150' }}"
                                class="card-img-top"
                                alt="{{ $item->produk->nama_produk }}"
                                style="border-radius: 16px 16px 0 0; height: 140px; object-fit: cover;">
                            <div class="card-body text-center py-3 px-2">
                                <a href="/products/{{  $item->produk->slug }}" class="fw-semibold text-decoration-none text-dark" style="font-size: 14px;">
                                    {{ $item->produk->nama_produk ?? 'Produk tidak ditemukan' }}
                                </a>
                                <div class="text-muted small mb-1">{{ $item->produk->category->name }}</div>
                                <div class="text-danger fw-bold" style="font-size: 14px;">
                                    Rp. {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}
                                </div>
                            </div>
                            <livewire:web.wishlist.delete-wishlist :id="$item->id" />

                        </div> --}}
                    </label>
                </div>
            @empty
                <div class="col">
                    <p>Tidak ada wishlist.</p>
                </div>
            @endforelse
        </div>

        
</div>
