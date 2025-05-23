<div class="header-wrapper" style="margin-block-end: 18px">
    <div class="header">
        <!-- Logo -->
        <div class="header-logo">
            <img src="assets/TokeEmasMitraBaru.png" alt="Logo">
            {{-- <div class="header-text">
                <h1>Mitra Baru</h1>
                <small>Jalan Muchran Ali, Mentawa Baru Ketapang, Sampit</small>
            </div> --}}
        </div>

        <!-- Search -->
        <div class="header-search">
            <input type="text" placeholder="Cari...">
            <button><i class="fas fa-search"></i></button>
        </div>

        <!-- Ikon -->
        <div class="header-icons">
            <a href="/cart" class="nav-link text-dark fw-bold" wire:navigate>
            <button><i class="fas fa-shopping-cart"></i></button>
            </a>

            <a href="/login" class="nav-link text-dark fw-bold" wire:navigate>
            <button><i class="fas fa-user"></i></button>
             </a>
        </div>
    </div>

    <!-- Navigasi -->
    <div class="header-nav">
        @foreach (['Emas Batangan', 'Souvenir', 'Gift', 'Liontin', 'Anting', 'Kalung', 'Cincin', 'Gelang'] as $kategori)
            <a href="#">{{ $kategori }}</a>
        @endforeach
    </div>
</div>
