

<div class="d-flex" style="min-height: 77vh;">
    <!-- Sidebar -->
    <div class="bg-orange text-white p-4 d-flex flex-column" style="width: 250px;">
        <!-- Foto Profil dan Nama -->
        <div class="d-flex flex-column align-items-center text-center mb-4">
<img src="<?php echo e($image ? 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/avatars/' . $image : 'https://www.seekpng.com/png/detail/143-1435868_headshot-silhouette-person-placeholder.png'); ?>"
     class="rounded-circle mb-2"
     style="width: 80px; height: 80px; object-fit: cover;">
    <h5 class="mb-0"><?php echo e($username_pembeli); ?></h5>
</div>

        <!-- Menu -->
       <ul class="list-unstyled flex-grow-1">
    <li class="mb-3">
        <div class="sidebar-item <?php echo e(request()->is('account/my-profile') ? 'active' : ''); ?>">
        <i ><span class="material-symbols-outlined">
    person
    </span></i>
        <a href="<?php echo e(route('account.my-profile')); ?>" wire:navigate>
            Akun saya
        </a>
    </div>
    </li>

    <li class="mb-3">
       <div class="sidebar-item <?php echo e(request()->is('account/my-orders') ? 'active' : ''); ?>">
    <i ><span class="material-symbols-outlined">
    shopping_bag
    </span></i>
    <a href="/account/my-orders" wire:navigate>
        Pesanan Saya
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item <?php echo e(request()->is('account/password') ? 'active' : ''); ?> fw-bold">
    <i ><span class="material-symbols-outlined">
    lock
    </span></i>
    <a href="/account/password" wire:navigate>
        Password
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item <?php echo e(request()->is('account/faq') ? 'active' : ''); ?>">
   <i ><span class="material-symbols-outlined">
    favorite
    </span></i>
    <a href="/wishlist" wire:navigate>
        Wishlist
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item <?php echo e(request()->is('account/faq') ? 'active' : ''); ?>">
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
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('auth.logout', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4028201643-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 bg-light p-4">
        <!-- Tab -->
        

        <!-- Form Profil -->
        <div class="bg-white p-4 shadow rounded">
            <h5 class="fw-bold">Profil Saya</h5>
            <small class="text-muted">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</small>
            <hr>

            <form wire:submit.prevent="update">
                <!-- Username -->
                        <div class="input-group mb-3">
                            <input type="password" wire:model="password" class="form-control rounded <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" placeholder="New Password">
                        </div>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-2 rounded border-0">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password_confirmation" class="form-control rounded" placeholder="Confirm Password">
                        </div>

                

                

               
                <!-- Submit -->
                <button type="submit" class="btn btn-warning text-white fw-semibold">Update Profile</button>
            </form>
        </div>
    </div>
</div>









<?php /**PATH /var/www/emasv3/resources/views/livewire/account/password/index.blade.php ENDPATH**/ ?>