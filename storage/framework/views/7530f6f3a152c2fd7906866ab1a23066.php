<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 shadow-lg rounded overflow-hidden" style="max-width: 900px;">

        <!-- Kolom Kiri (Branding + Gambar) -->
        <div class="col-md-6 d-none d-md-block p-0">
            <div class="h-100 w-100" style="background-image: url('<?php echo e(asset($randomProduk->linkgambar)); ?>'); background-size: cover; background-position: center; position: relative;">
                <div class="position-absolute top-0 start-0 p-4 d-flex align-items-center">
                    <img src="assets/logoEmas.png" alt="Logo" style="100px; height: 100px; object-fit: contain;">
                    <div class=" text-white">
                        <h5 class="mb-0">Mitra Baru</h5>
                        <small>Toko Perhiasan Emas</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Form Register) -->
        <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center">
            <h4 class="text-center fw-bold text-orange mb-4">Register Account</h4>
            
            <form wire:submit.prevent="register">

                <!-- Full Name -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-white"><i class="bi bi-person text-orange"></i></span>
                    <input type="text" wire:model.blur="nama_pembeli" value="<?php echo e(old('nama_pembeli')); ?>"
                        class="form-control rounded-end <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Full Name">
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Email -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-white"><i class="bi bi-envelope text-orange"></i></span>
                    <input type="text" wire:model.blur="username_pembeli" value="<?php echo e(old('username_pembeli')); ?>"
                        class="form-control rounded-end <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email Address">
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Password -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-white"><i class="bi bi-lock text-orange"></i></span>
                    <input type="password" wire:model.blur="password"
                        class="form-control rounded-end <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password">
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Password Confirmation -->
                <div class="input-group mb-4">
                    <span class="input-group-text bg-white"><i class="bi bi-shield-lock text-orange"></i></span>
                    <input type="password" wire:model.blur="password_confirmation"
                        class="form-control rounded-end" placeholder="Password Confirmation">
                </div>

                <button type="submit" class="btn btn-warning text-white w-100 fw-bold rounded-pill py-2">Register</button>
            </form>

            <div class="text-center mt-3">
                <span>Already have an account?</span>
                <a href="/login" class="text-decoration-none fw-bold text-orange ms-2" wire:navigate>Login</a>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /var/www/emasv3/resources/views/livewire/auth/register.blade.php ENDPATH**/ ?>