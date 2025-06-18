<div class="container py-4">
    <h2 class="fw-bold mb-4">Wishlist Saya</h2>

  
        <div class="row row-cols-2 row-cols-md-5 g-4">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col position-relative">
                    <label class="d-block position-relative">
                       
                        <!-- Kartu Produk -->
                        <div class="card shadow-sm border-0" style="border-radius: 16px; box-shadow: 0 0 12px #ffe9c4;">
                            <img src="<?php echo e($item->produk->linkgambar ?? 'https://via.placeholder.com/150'); ?>"
                                class="card-img-top"
                                alt="<?php echo e($item->produk->nama_produk); ?>"
                                style="border-radius: 16px 16px 0 0; height: 140px; object-fit: cover;">

                            <div class="card-body text-center py-3 px-2" style="min-height: 140px;">
                                <a href="/products/<?php echo e($item->produk->slug); ?>"
                                    class="fw-semibold text-decoration-none text-dark d-block mb-1"
                                    style="font-size: 14px; line-height: 1.2em; height: 3.6em; overflow: hidden;">
                                    <?php echo e($item->produk->nama_produk ?? 'Produk tidak ditemukan'); ?>

                                </a>
                                <div class="text-muted small mb-1"><?php echo e($item->produk->category->name); ?></div>
                                <div class="text-danger fw-bold" style="font-size: 14px;">
                                    Rp. <?php echo e(number_format($item->produk->harga ?? 0, 0, ',', '.')); ?>

                                </div>
                            </div>

                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.wishlist.delete-wishlist', ['id' => $item->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-100558323-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </div>



                        
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col">
                    <p>Tidak ada wishlist.</p>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
</div>
<?php /**PATH /var/www/emasv3/resources/views/livewire/web/wishlist/index.blade.php ENDPATH**/ ?>