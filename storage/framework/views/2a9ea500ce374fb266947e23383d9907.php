

<div class="d-flex" style="height:77vh">
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
       <div class="sidebar-item <?php echo e(request()->is('account/my-orders') ? 'active' : ''); ?> fw-bold">
    <i ><span class="material-symbols-outlined">
    shopping_bag
    </span></i>
    <a href="/account/my-orders" wire:navigate>
        Pesanan Saya
    </a>
</div>

    </li>

    <li class="mb-3">
        <div class="sidebar-item <?php echo e(request()->is('account/password') ? 'active' : ''); ?>">
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

$__html = app('livewire')->mount($__name, $__params, 'lw-3382026084-0', $__slots ?? [], get_defined_vars());

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
    <div class="flex-grow-1 bg-light pt-0 px-4 p-4">
        <!-- Tab -->
        <div class="bg-orange d-flex justify-content-around text-white p-2 mb-4 rounded">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['semua' => 'Semua', 'pembayaran' => 'Pembayaran', 'kemas' => 'Proses Kemas', 'dikirim' => 'Dikirim', 'selesai' => 'Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div 
            role="button"
            wire:click="setFilter('<?php echo e($key); ?>')" 
            class="px-3 py-1 rounded <?php echo e($filter === $key ? 'bg-white text-dark fw-bold' : ''); ?>"
            style="cursor: pointer;">
            <?php echo e($label); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>
        

            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card border mb-3 shadow-sm " style="height: 160px;">
        <div class="card-body">
            <a href="<?php echo e(route('account.my-orders.show', $transaction->snap_token)); ?>" wire:navigate class="text-decoration-none text-dark">
                <div class="row g-3 align-items-center">
                    <!-- Gambar produk -->
                    <div class="col-auto">
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        
                    </div>

                    <!-- Info produk dan order -->
                    <div class="col">
                        <h6 class="fw-bold mb-1">Order ID #<?php echo e($transaction->invoice); ?></h6>
                        <p class="mb-1 text-muted">Jumlah Produk: <?php echo e($transaction->items_count ?? '1'); ?></p>
                        <p class="mb-0 text-muted">Status: 
                            <!--[if BLOCK]><![endif]--><?php if($transaction->status == 'pending'): ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php elseif($transaction->status == 'success'): ?>
                                <span class="badge bg-success">Success</span>
                            <?php elseif($transaction->status == 'expired'): ?>
                                <span class="badge bg-secondary">Expired</span>
                            <?php elseif($transaction->status == 'failed'): ?>
                                <span class="badge bg-danger">Failed</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </p>
                    </div>

                    <!-- Harga dan aksi -->
                    <div class="col text-end">
                        <div class="mb-2">
                            <span class="fw-bold">Rp. <?php echo e(number_format($transaction->total)); ?></span>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="card rounded border mb-3 ">
        <div class="card-body">
            <div class="text-center py-3">
                <span class="fw-bold">You don't have any orders.</span>
            </div>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<!-- Navigasi Pagination -->
<?php echo e($transactions->links('vendor.pagination.simple-default')); ?>



            


       
        
    </div>
</div>





<?php /**PATH /var/www/emasv3/resources/views/livewire/account/my-orders/index.blade.php ENDPATH**/ ?>