{{-- <div class="container">
    <div class="row justify-content-center mt-0" style="margin-bottom: 150px;">
        <div class="col-md-6">

            <x-menus.customer />

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-4">
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person mb-1" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        My Profile
                    </h6>
                    <hr />

                    <form wire:submit.prevent="update">

                        <div class="input-group mb-3">
                          <input type="file" wire:model="image" class="form-control rounded @error('image') is-invalid @enderror" v-model="image" placeholder="Upload Image" onchange="previewImage')">
                        </div>
                        @error('image')
                            <div class="alert alert-danger mt-2 rounded border-0">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="input-group mb-3">
                          <input type="text" wire:model="nama_pembeli" class="form-control rounded @error('name') is-invalid @enderror" v-model="nama_pembeli" placeholder="Full Name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-2 rounded border-0">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <div class="input-group mb-3">
                          <input type="text" wire:model="username_pembeli" class="form-control rounded @error('email') is-invalid @enderror" v-model="username_pembeli" placeholder="username_pembeli">
                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-2 rounded border-0">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <button class="btn btn-orange-2 rounded" type="submit">Update Profile</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="d-flex" style="height:77vh">
    <!-- Sidebar -->
    <div class="bg-orange text-white p-4 d-flex flex-column" style="width: 250px;">
        <!-- Foto Profil dan Nama -->
         <div class="d-flex flex-column align-items-center text-center mb-4">
<img src="{{ $image ? 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/avatars/' . $image : 'https://www.seekpng.com/png/detail/143-1435868_headshot-silhouette-person-placeholder.png' }}"
     class="rounded-circle mb-2"
     style="width: 80px; height: 80px; object-fit: cover;">
    <h5 class="mb-0">{{ $username_pembeli }}</h5>
</div>

        <!-- Menu -->
         <ul class="list-unstyled flex-grow-1">
    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/my-profile') ? 'active' : '' }}">
        <i ><span class="material-symbols-outlined">
    person
    </span></i>
        <a href="{{ route('account.my-profile') }}" wire:navigate>
            Akun saya
        </a>
    </div>
    </li>

    <li class="mb-3">
       <div class="sidebar-item {{ request()->is('account/my-orders') ? 'active' : '' }} fw-bold">
    <i ><span class="material-symbols-outlined">
    shopping_bag
    </span></i>
    <a href="/account/my-orders" wire:navigate>
        Pesanan Saya
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/password') ? 'active' : '' }}">
     <i ><span class="material-symbols-outlined">
    lock
    </span></i>
    <a href="/account/password" wire:navigate>
        Password
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/faq') ? 'active' : '' }}">
     <i ><span class="material-symbols-outlined">
    favorite
    </span></i>
    <a href="/wishlist" wire:navigate>
        Wishlist
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/faq') ? 'active' : '' }}">
    <i ><span class="material-symbols-outlined">
    help
    </span></i>
    <a href="/account/faq" wire:navigate>
        FAQ
    </a>
</div>

    </li>
</ul>

        <!-- Logout -->
        <div class="mt-auto">
            <livewire:auth.logout />
            {{-- <a href="#" class="text-white d-flex align-items-center">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a> --}}
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 bg-light pt-0 px-4 p-4">
        <!-- Tab -->
        <div class="bg-orange d-flex justify-content-around text-white p-2 mb-4 rounded">
    @foreach(['semua' => 'Semua', 'pembayaran' => 'Pembayaran', 'kemas' => 'Proses Kemas', 'dikirim' => 'Dikirim', 'selesai' => 'Selesai'] as $key => $label)
        <div 
            role="button"
            wire:click="setFilter('{{ $key }}')" 
            class="px-3 py-1 rounded {{ $filter === $key ? 'bg-white text-dark fw-bold' : '' }}"
            style="cursor: pointer;">
            {{ $label }}
        </div>
    @endforeach
</div>
        {{-- <div class="bg-orange d-flex justify-content-around text-white p-2 mb-4 rounded">
            <div>Semua</div>
            <div>Pembayaran</div>
            <div>Proses Kemas</div>
            <div>Dikirim</div>
            <div>Selesai</div>
        </div> --}}

            @forelse ($transactions as $transaction)
    <div class="card border mb-3 shadow-sm " style="height: 160px;">
        <div class="card-body">
            <a href="{{ route('account.my-orders.show', $transaction->snap_token) }}" wire:navigate class="text-decoration-none text-dark">
                <div class="row g-3 align-items-center">
                    <!-- Gambar produk -->
                    <div class="col-auto">
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        {{-- <img src="/placeholder.svg?height=80&width=80" alt="Produk" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;"> --}}
                    </div>

                    <!-- Info produk dan order -->
                    <div class="col">
                        <h6 class="fw-bold mb-1">Order ID #{{ $transaction->invoice }}</h6>
                        <p class="mb-1 text-muted">Jumlah Produk: {{ $transaction->items_count ?? '1' }}</p>
                        <p class="mb-0 text-muted">Status: 
                            @if($transaction->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($transaction->status == 'success')
                                <span class="badge bg-success">Success</span>
                            @elseif($transaction->status == 'expired')
                                <span class="badge bg-secondary">Expired</span>
                            @elseif($transaction->status == 'failed')
                                <span class="badge bg-danger">Failed</span>
                            @endif
                        </p>
                    </div>

                    <!-- Harga dan aksi -->
                    <div class="col text-end">
                        <div class="mb-2">
                            <span class="fw-bold">Rp. {{ number_format($transaction->total) }}</span>
                        </div>
                       <div class="d-flex justify-content-end">
    <div class="d-flex flex-column gap-2" style="max-width: 150px;">
        <button class="btn btn-sm btn-primary">Beli Lagi</button>
        <button class="btn btn-sm btn-outline-secondary">Hubungi Penjual</button>
    </div>
</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@empty
    <div class="card rounded border mb-3 ">
        <div class="card-body">
            <div class="text-center py-3">
                <span class="fw-bold">You don't have any orders.</span>
            </div>
        </div>
    </div>
@endforelse

<!-- Navigasi Pagination -->
{{ $transactions->links('vendor.pagination.simple-default') }}


            {{-- <div class="container my-4">
                <div class="card mb-3 p-3 shadow-sm">
                    <div class="row g-3 align-items-center">
                        <!-- Product Image -->
                        <div class="col-auto">
                            <img src="/placeholder.svg?height=80&width=80" alt="Cincin Aurum lab Emas 9 karat" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>

                        <!-- Product Info -->
                        <div class="col">
                            <h5 class="mb-1 fw-semibold">Cincin Aurum lab Emas 9 karat</h5>
                            <p class="mb-1 text-muted">Variasi : Cincin</p>
                            <p class="mb-0 text-muted">x1</p>
                        </div>

                        <!-- Pricing Section -->
                        <div class="col text-end">
                            <div class="mb-2">
                                <span class="text-decoration-line-through text-muted me-2">Rp. 999.000</span>
                                <span class="text-danger fw-semibold">Rp. 819.000</span>
                            </div>
                            <div>
                                <span class="text-muted me-2">Total Pesanan:</span>
                                <span class="fw-bold text-danger fs-5">Rp. 819.000</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-auto d-flex flex-column gap-2">
                            <button class="btn btn-sm btn-primary">Beli Lagi</button>
                            <button class="btn btn-sm btn-outline-secondary">Hubungi Penjual</button>
                        </div>
                    </div>
                </div>
            </div> --}}


       
        
    </div>
</div>



{{-- <div class="container">
    <div class="row justify-content-center mt-0" style="margin-bottom: 150px;">
        <div class="col-md-6">

            <x-menus.customer />

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-4">
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        My Orders
                    </h6>
                    <hr />

                    @forelse ($transactions as $transaction)
                    <div class="card rounded border mb-3">
                        <div class="row g-0">
                            <div class="col-12 col-md-12">
                                <a href="{{ route('account.my-orders.show', $transaction->snap_token) }}" wire:navigate class="text-decoration-none text-dark">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3 mb-1 me-2" viewBox="0 0 16 16">
                                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6z" />
                                                </svg>
                                                <span class="fw-bold">Order ID #{{ $transaction->invoice }}</span>
                                            </div>
                                            <div>
                                                @if($transaction->status == 'pending')
                                                <button class="btn btn-warning btn-sm rounded shadow-sm border-0">PENDING</button>
                                                @elseif($transaction->status == 'success')
                                                <button class="btn btn-success btn-sm rounded shadow-sm border-0">SUCCESS</button>
                                                @elseif($transaction->status == 'expired')
                                                <button class="btn btn-warning btn-sm rounded shadow-sm border-0" disabled>EXPIRED</button>
                                                @elseif($transaction->status == 'failed')
                                                <button class="btn btn-danger btn-sm rounded shadow-sm border-0">FAILED</button>
                                                @endif

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="fw-bold">Grand Total:</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">Rp. {{ number_format($transaction->total) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card rounded border mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="mt-2">
                                    <span class="fw-bold">You don't have any orders.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <!-- Navigasi Pagination -->
                    {{ $transactions->links('vendor.pagination.simple-default') }}


                </div>
            </div>

        </div>
    </div>
</div> --}}

