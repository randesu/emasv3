
@section('title')
{{ $produk->nama_produk }} - Toko Emas Online
@stop

@section('image')
{{ asset($produk->linkgambar) }}
@stop

<div class="container my-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <div class="border p-3 rounded">
                <img src="{{ asset($produk->linkgambar) }}" class="img-fluid" alt="{{ $produk->nama_produk }}">
                <div class="mt-2 d-flex gap-2">
                    <!-- Thumbnail tambahan jika ada -->
                    <img src="{{ asset($produk->linkgambar) }}" width="60" class="border rounded" alt="thumb1">
                    <img src="{{ asset($produk->linkgambar) }}" width="60" class="border rounded" alt="thumb2">
                </div>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h4><strong>{{ $produk->nama_produk }}</strong></h4>
            <h5 class="text-orange mt-3 mb-4" style="color: #ff6600;">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h5>

            <table class="table table-borderless mb-4">
                <tr>
                    <td><strong>Nomor SKU</strong></td>
                    <td>: {{ $produk->kode_produk }}</td>
                </tr>
                <tr>
                    <td><strong>Berat</strong></td>
                    <td>: ± {{ $produk->berat_produk }} gram</td>
                </tr>
                <tr>
                    <td><strong>Kadar</strong></td>
                    <td>: {{ $produk->kadar_barang }}</td>
                </tr>
                <tr>
                    <td><strong>Kategori</strong></td>
                    <td>: {{ $produk->category->name }}</td>

                </tr>
            </table>

            <!-- Kuantitas dan Tombol -->
            <div class="d-flex align-items-center gap-2 mb-3">
                <strong>Kuantitas</strong>
                <button class="btn btn-outline-secondary btn-sm" onclick="kurangiJumlah()">-</button>
                <input type="number" min="1" max="{{ $produk->stok }}" value="1" id="jumlah" class="form-control d-inline-block text-center" style="width: 60px;">
                <button class="btn btn-outline-secondary btn-sm" onclick="tambahJumlah()">+</button>
                <span class="ms-2 text-muted">Stok: {{ $produk->stok }}</span>
            </div>

            <div class="d-flex gap-3 mb-4 align-items-stretch">
    <livewire:web.cart.btn-add-to-cart-full :id_produk="$produk->id" />

    {{-- <button 
        wire:click="$set('product_id', {{ $produk->id }}); addToWishlist()" 
        class="btn text-white flex-fill h-100 " style="background-color: #ff6600"
    >
        Tambahkan ke Wishlist
    </button> --}}
    <livewire:web.wishlist.btn-add-to-wishlist :id_produk="$produk->id" />
</div>

            <!-- Spesifikasi Produk -->
            <div class="bg-light rounded p-3 mt-3">
                <h6 class="fw-bold">Spesifikasi Produk</h6>
                <p>{{ $produk->deskripsi ?? 'Deskripsi belum tersedia.' }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    function tambahJumlah() {
        let input = document.getElementById("jumlah");
        if (parseInt(input.value) < {{ $produk->stok }}) {
            input.value = parseInt(input.value) + 1;
        }
    }

    function kurangiJumlah() {
        let input = document.getElementById("jumlah");
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    function masukkanKeranjang() {
        alert("Produk ditambahkan ke keranjang!");
        // Tambahkan fungsi Livewire atau AJAX di sini
    }

    function beliSekarang() {
        alert("Menuju halaman pembelian!");
        // Tambahkan logika redirect atau AJAX
    }
</script>
