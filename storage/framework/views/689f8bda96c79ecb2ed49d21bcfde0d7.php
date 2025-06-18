<div class="card h-100 d-flex flex-column" style="width: 18rem;">
  <div style="height: 200px; overflow: hidden;">
    <img src="<?php echo e(asset($produk->linkgambar)); ?>" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="<?php echo e($produk->nama_produk); ?>">
  </div>
  <div class="card-body d-flex flex-column">
    <a href="/products/<?php echo e($produk->slug); ?>" class="text-decoration-none text-dark mb-2" wire:navigate>
        <h6 class="card-title text-truncate-multiline" style="-webkit-line-clamp: 2;"><?php echo e($produk->nama_produk); ?></h6>
    </a>
    <p class="card-text mb-3">Rp. <?php echo e(number_format($produk->harga)); ?></p>

    <div class="mt-auto">
<span class="fw-bold">  ☆
    <?php echo e(number_format($produk->ratings_avg_rating ?? 0, 1)); ?>

</span>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.cart.btn-add-to-cart', ['idProduk' => $produk->id,'id_produk' => $produk->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3250538337-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
  </div>
</div>






    
    


                    
 <?php /**PATH /var/www/emasv3/resources/views/components/cards/produk.blade.php ENDPATH**/ ?>