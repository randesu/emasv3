
<div class="d-flex gap-3" style="margin-inline-end: none;">
<div x-data="{ jumlah: <?php if ((object) ('jumlah') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('jumlah'->value()); ?>')<?php echo e('jumlah'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('jumlah'); ?>')<?php endif; ?>.live }">
    <div class="d-flex align-items-center gap-2 mb-3">
        <strong >Kuantitas</strong>
        <button type="button" class="btn btn-outline-secondary btn-sm"
                @click="if(jumlah > 1) jumlah--">-</button>
        <input type="number"
               min="1"
               x-model="jumlah"
               class="form-control d-inline-block text-center"
               style="width: 60px;">
        <button type="button" class="btn btn-outline-secondary btn-sm"
                @click="jumlah++">+</button>
    </div>

    <button wire:click="addToCart" class="btn btn-cart-custom flex-fill d-flex align-items-center justify-content-center gap-2" style="margin-inline-end: none ">
        Tambah ke Keranjang
    </button>
</div>
</div><?php /**PATH /var/www/emasv3/resources/views/livewire/web/cart/btn-add-to-cart-full.blade.php ENDPATH**/ ?>