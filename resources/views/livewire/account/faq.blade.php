<div class="d-flex" style="min-height: 77vh;">
    <!-- Sidebar -->
    <div class="bg-orange text-white p-4 d-flex flex-column" style="width: 250px;">
        <!-- Foto Profil dan Nama -->
        <div class="d-flex flex-column align-items-center text-center mb-4">
    <img src="{{ 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/'}}avatars/{{ $image  ?? 'https://www.seekpng.com/png/detail/143-1435868_headshot-silhouette-person-placeholder.png' }}"
         class="rounded-circle mb-2"
         style="width: 80px; height: 80px; object-fit: cover;">
    <h5 class="mb-0">{{ $username_pembeli }}</h5>
</div>

        <!-- Menu -->
       <ul class="list-unstyled flex-grow-1">
    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/my-profile') ? 'active' : '' }}">
        <i class="bi bi-person"></i>
        <a href="{{ route('account.my-profile') }}" wire:navigate>
            Akun saya
        </a>
    </div>
    </li>

    <li class="mb-3">
       <div class="sidebar-item {{ request()->is('account/my-orders') ? 'active' : '' }}">
    <i class="bi bi-list-task"></i>
    <a href="/account/my-orders" wire:navigate>
        Pesanan Saya
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/password') ? 'active' : '' }} ">
    <i class="bi bi-bell"></i>
    <a href="/account/password" wire:navigate>
        Password
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item {{ request()->is('account/faq') ? 'active' : '' }}fw-bold">
    <i class="bi bi-bell"></i>
    <a href="/account/faq" wire:navigate>
        FAQ
    </a>
</div>

    </li>
</ul>


        
        <!-- Logout -->
        <div class="mt-auto">
            <livewire:auth.logout />
            
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 bg-light p-4">
       
        <div class="bg-white p-4 shadow rounded">
            <div class="space-y-4">
    <h2 class="text-xl font-bold mb-4">Pertanyaan Umum</h2>

    @foreach ($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border rounded-md p-4 shadow-sm">
            <button @click="open = !open" class="w-full text-left flex justify-between items-center font-semibold text-lg">
                {{ $faq->pertanyaan }}
                <svg x-show="!open" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
                <svg x-show="open" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M20 12H4" />
                </svg>
            </button>

            <div x-show="open" x-transition class="mt-2 text-gray-700">
                {{ $faq->jawaban }}
            </div>
        </div>
    @endforeach
</div>




            
        </div>
    </div>
</div>



