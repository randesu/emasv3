<div class="container mx-auto mt-6">
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    
                    <th scope="col" class="px-4 py-3">Produk</th>
                    <th scope="col" class="px-4 py-3">Harga Satuan</th>
                    <th scope="col" class="px-4 py-3">Kuantitas</th>
                    <th scope="col" class="px-4 py-3">Total Harga</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $keranjangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keranjang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="bg-white border-b">
                
                    <td class="flex items-center px-4 py-4 space-x-3">
                        <img src="<?php echo e($keranjang->produk->linkgambar); ?>" class="w-20 h-20 object-cover rounded" />
                        <span><?php echo e($keranjang->produk->nama_produk); ?></span>
                    </td>
                    <td class="px-4 py-4 text-orange-600 font-semibold">Rp. <?php echo e(number_format($keranjang->produk->harga)); ?></td>
                    <td class="px-4 py-4">
                        <div class="flex items-center space-x-2">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.cart.btn-decrement', ['idProduk' => $keranjang->id_produk,'id' => $keranjang->id,'id_produk' => $keranjang->id_produk,'disabled' => $keranjang->jumlah_beli]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3466052778-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <input type="number" value="<?php echo e($keranjang->jumlah_beli); ?>" class="w-12 text-center border rounded" readonly />
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.cart.btn-increment', ['idProduk' => $keranjang->id_produk,'id' => $keranjang->id,'id_produk' => $keranjang->id_produk]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3466052778-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-orange-600 font-semibold">
                        Rp. <?php echo e(number_format($keranjang->produk->harga * $keranjang->jumlah_beli)); ?>

                    </td>
                    <td class="px-4 py-4 text-red-500">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.cart.btn-delete', ['id' => $keranjang->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3466052778-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5 font-semibold text-gray-600">Tidak ada produk dalam keranjang</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

   <!--[if BLOCK]><![endif]--><?php if(count($keranjangs) > 0): ?>
<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-md z-50 px-4 py-3 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        
    </div>
    <div class="text-right space-y-1 text-sm">
        <div>
            <span class="font-medium">Total (<?php echo e(count($keranjangs)); ?> produk):</span>
            <span class="text-orange-600 font-bold">Rp. <?php echo e(number_format($totalPrice)); ?></span>
        </div>
        <a href="/checkout" wire:navigate class="block text-center text-white px-6 py-2 rounded shadow" style="background-color: orange">
    CheckOut
</a>
    </div>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /var/www/emasv3/resources/views/livewire/web/cart/index.blade.php ENDPATH**/ ?>