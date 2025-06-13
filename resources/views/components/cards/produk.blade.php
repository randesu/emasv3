<div class="card h-100 d-flex flex-column" style="width: 18rem;">
  <div style="height: 200px; overflow: hidden;">
    <img src="{{ asset($produk->linkgambar) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $produk->nama_produk }}">
  </div>
  <div class="card-body d-flex flex-column">
    <a href="/products/{{ $produk->slug }}" class="text-decoration-none text-dark mb-2" wire:navigate>
        <h6 class="card-title text-truncate-multiline" style="-webkit-line-clamp: 2;">{{ $produk->nama_produk }}</h6>
    </a>
    <p class="card-text mb-3">Rp. {{ number_format($produk->harga) }}</p>

    <div class="mt-auto">
<span class="fw-bold">  ☆
    {{ number_format($produk->ratings_avg_rating ?? 0, 1) }}
</span>
        <livewire:web.cart.btn-add-to-cart :id_produk='$produk->id' />
    </div>
  </div>
</div>


{{-- <div class="card" style="width: 18rem;">
  <div style="height: 200px; overflow: hidden;">
    <img src="{{ asset($produk->linkgambar) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="...">
  </div>
  <div class="card-body">
    <a href="/products/{{ $produk->slug }}" class="text-decoration-none text-dark" wire:navigate>
        <h6 class="card-title">{{ $produk->nama_produk }}</h6>
    </a>
    <p class="card-text">Rp. {{ number_format($produk->harga) }}</p>
    <livewire:web.cart.btn-add-to-cart :id_produk='$produk->id' />
  </div>
</div> --}}


{{-- <div class="card" style="width: 18rem;">
  <img src="{{ asset($produk->linkgambar) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <a href="/products/{{ $produk->slug }}" class="text-decoration-none text-dark" wire:navigate>
        <h6 class="card-title">{{ $produk->nama_produk }}</h6>
    </a>
    <p class="card-text">Rp. {{ number_format($produk->harga) }}</p> --}}
    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    {{-- <livewire:web.cart.btn-add-to-cart :id_produk='$produk->id' />
  </div>
</div> --}}

{{-- 
<div class="card rounded border-0 shadow-sm mb-3">
    <div class="row g-0">
        <div class="col-5 col-md-4">
            <a href="/products/{{ $produk->slug }}" class="text-decoration-none" wire:navigate>
                <img src="{{ asset($produk->linkgambar) }}" class="img-fluid w-100 h-100 object-fit-cover rounded-start" alt="...">
            </a>
        </div>
        <div class="col-7 col-md-8">
            <div class="card-body">
                <a href="/products/{{ $produk->slug }}" class="text-decoration-none text-dark" wire:navigate>
                    <h6 class="card-title">{{ $produk->nama_produk }}</h6>
                </a>
                <p class="fw-bold text-success mt-3">Rp. {{ number_format($produk->harga) }}</p>
                <div class="d-flex justify-content-between mt-5">
                    <div class="mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-orange mb-1 me-2" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        {{-- <span class="fw-bold">{{ number_format($product->ratings_avg_rating, 1) }}</span> --}}
                    {{-- </div>
                    <div>
                        <!-- button add to cart -->
                        <div>
                    <!-- button add to cart -->
                    <livewire:web.cart.btn-add-to-cart :id_produk='$produk->id' />
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
{{-- </div> --}} 