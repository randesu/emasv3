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

<div class="d-flex" style="min-height: 77vh;">
    <!-- Sidebar -->
    <div class="bg-orange text-white p-4 d-flex flex-column" style="width: 250px;">
        <!-- Foto Profil dan Nama -->
        <div class="d-flex flex-column align-items-center text-center mb-4">
    <img src="{{ $imagePreview ?? 'https://www.seekpng.com/png/detail/143-1435868_headshot-silhouette-person-placeholder.png' }}"
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
        <div class="sidebar-item {{ request()->is('account/password') ? 'active' : '' }} fw-bold">
    <i class="bi bi-bell"></i>
    <a href="/account/password" wire:navigate>
        Password
    </a>
</div>

    </li>
</ul>


        {{-- <ul class="list-unstyled flex-grow-1">
            <li class="mb-3">
                <i class="bi bi-person"></i>
                <a href="{{ route('account.my-profile') }}" style="text-decoration: none; color: white" wire:navigate>Akun saya</a>
            </li>
            <li class="mb-3"><i class="bi bi-list-task"></i> 
             <a href="/account/my-orders" style="text-decoration: none; color: white" wire:navigate>
                            Pesanan Saya</a></li>
            <li class="mb-3  fw-bold"><i class="bi bi-bell" ></i> <a href="/account/password" wire:navigate class="text-decoration-none" style="color: white">
                 Password
            </a></li>
        </ul> --}}

        <!-- Logout -->
        <div class="mt-auto">
            <livewire:auth.logout />
            {{-- <a href="#" class="text-white d-flex align-items-center">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a> --}}
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 bg-light p-4">
        <!-- Tab -->
        {{-- <div class="bg-orange d-flex justify-content-around text-white p-2 mb-4 rounded">
            <div>Semua</div>
            <div>Pembayaran</div>
            <div>Proses Kemas</div>
            <div>Dikirim</div>
            <div>Selesai</div>
        </div> --}}

        <!-- Form Profil -->
        <div class="bg-white p-4 shadow rounded">
            <h5 class="fw-bold">Profil Saya</h5>
            <small class="text-muted">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</small>
            <hr>

            <form wire:submit.prevent="update">
                <!-- Username -->
                        <div class="input-group mb-3">
                            <input type="password" wire:model="password" class="form-control rounded @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="New Password">
                        </div>
                        @error('password')
                        <div class="alert alert-danger mt-2 rounded border-0">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password_confirmation" class="form-control rounded" placeholder="Confirm Password">
                        </div>

                

                

               
                <!-- Submit -->
                <button type="submit" class="btn btn-warning text-white fw-semibold">Update Profile</button>
            </form>
        </div>
    </div>
</div>



{{-- <div class="container">
    <div class="row justify-content-center mt-0" style="margin-bottom: 150px;">
        <div class="col-md-6">

            <x-menus.customer />

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-4">
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-key mb-1" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5" />
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                        Update Password
                    </h6>
                    <hr />

                    <form wire:submit.prevent="update">

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password" class="form-control rounded @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="New Password">
                        </div>
                        @error('password')
                        <div class="alert alert-danger mt-2 rounded border-0">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password_confirmation" class="form-control rounded" placeholder="Confirm Password">
                        </div>

                        <button class="btn btn-orange-2 rounded" type="submit">Update Password</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div> --}}




{{-- 
<div class="container">
    <div class="row justify-content-center mt-0" style="margin-bottom: 150px;">
        <div class="col-md-6">

            <x-menus.customer />

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Profil Saya</h5>
                    <p class="text-muted">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>

                    <form wire:submit.prevent="updateProfile">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control bg-light" value="{{ $username }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger mt-2 rounded border-0">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-warning text-white fw-bold px-4">Update Profile</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div> --}}
