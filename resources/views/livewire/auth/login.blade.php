<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 shadow-lg rounded overflow-hidden" style="max-width: 900px;">

        <!-- Kolom Kiri (Gambar dan Brand) -->
        <div class="col-md-6 d-none d-md-block p-0">
            <div class="h-100 w-100" style="background-image: url('{{ asset($produk->random()->linkgambar) }}'); background-size: cover; background-position: center; position: relative;">
                <div class="position-absolute top-0 start-0 d-flex align-items-center">
                    <img src="assets/logoEmas.png" alt="Logo" style="width: 100px; height: 100px; object-fit: contain;">
                    <div class=" text-white">
                        <h5 class="mb-0">Mitra Baru</h5>
                        <small>Toko Perhiasan Emas</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Form Login) -->
        <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center">
            <h3 class="text-center mb-4 fw-bold">Login</h3>
            <form wire:submit.prevent="login">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="text" wire:model.blur="username_pembeli" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" wire:model.blur="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning text-white w-100 mt-3">Login</button>

                <div class="d-flex justify-content-between mt-3">
                    <a href="/register" class="text-decoration-none small">Create an account</a>
                    <a href="/forgot-password" class="text-decoration-none small">Forgot password?</a>
                </div>
            </form>
        </div>

    </div>
</div>
