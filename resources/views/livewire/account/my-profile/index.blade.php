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

<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div class="bg-orange text-white p-4 d-flex flex-column" style="width: 250px;">
        <!-- Foto Profil dan Nama -->
        <div class="text-center mb-4">
            <img src="{{ $imagePreview ?? 'https://via.placeholder.com/80' }}"
                 class="rounded-circle mb-2"
                 style="width: 80px; height: 80px; object-fit: cover;">
            <h5>{{ $username_pembeli }}</h5>
        </div>

        <!-- Menu -->
        <ul class="list-unstyled flex-grow-1">
            <li class="mb-3 fw-bold">
                <i class="bi bi-person"></i> Akun Saya
            </li>
            <li class="mb-3"><i class="bi bi-list-task"></i> Pesanan Saya</li>
            <li class="mb-3"><i class="bi bi-bell"></i> Notifikasi</li>
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
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{ $username_pembeli }}" disabled>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" wire:model="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror">
                    @error('nama_pembeli') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Email -->
                {{-- <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div> --}}

                <!-- Nomor Telepon -->
                {{-- <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" wire:model="no_hp" class="form-control @error('no_hp') is-invalid @enderror">
                    @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div> --}}

                <!-- Jenis Kelamin -->
                {{-- <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="jenis_kelamin" value="Laki-Laki">
                        <label class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="jenis_kelamin" value="Perempuan">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div> --}}

                <!-- Tanggal Lahir -->
                {{-- <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" wire:model="tanggal_lahir" class="form-control">
                </div> --}}

                <!-- Upload Gambar -->
                {{-- <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <small class="text-muted">Ukuran gambar maks. 1 MB. Format: JPEG, PNG</small>
                </div> --}}

                <!-- Submit -->
                <button type="submit" class="btn btn-warning text-white fw-semibold">Update Profile</button>
            </form>
        </div>
    </div>
</div>
