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
            <div class="col-10 col-md-16">
                <div class="text-center">
                    <form action="/products" method="GET">
                        <div class="input-group mb-3 rounded">
                            <input type="text" name="search" class="form-control form-control-lg rounded shadow-sm border-0" placeholder="cari yang kamu inginkan..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div>
                    </form>
                </div>
            </div>
            {{-- <input type="text" placeholder="Cari...">
            <button><i class="fas fa-search"></i></button> --}}
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
        <button>
        @foreach ($categories as $category)
                        <x-cards.category :category="$category" />
                    @endforeach
        </button>
        {{-- @foreach (['Emas Batangan', 'Souvenir', 'Gift', 'Liontin', 'Anting', 'Kalung', 'Cincin', 'Gelang'] as $kategori)
            <a href="#">{{ $kategori }}</a>
        @endforeach --}}
    </div>
</div>
