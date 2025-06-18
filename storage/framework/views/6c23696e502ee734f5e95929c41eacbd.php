<?php $__env->startSection('title'); ?>
Products - Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
Food Store, Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
Food Store - Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('image'); ?>
<?php echo e(asset('images/logo.png')); ?>

<?php $__env->stopSection(); ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                    <span class="fs-6 fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        Daftar Produk
                    </span>
                </div>
            <hr />
            <div class="row">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <?php if (isset($component)) { $__componentOriginal4c0540cf084226e606ecc1d40629ea5d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c0540cf084226e606ecc1d40629ea5d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.produk','data' => ['produk' => $produk]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.produk'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['produk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($produk)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c0540cf084226e606ecc1d40629ea5d)): ?>
<?php $attributes = $__attributesOriginal4c0540cf084226e606ecc1d40629ea5d; ?>
<?php unset($__attributesOriginal4c0540cf084226e606ecc1d40629ea5d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c0540cf084226e606ecc1d40629ea5d)): ?>
<?php $component = $__componentOriginal4c0540cf084226e606ecc1d40629ea5d; ?>
<?php unset($__componentOriginal4c0540cf084226e606ecc1d40629ea5d); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            
            <div class="mb-5">
                <?php echo e($products->links('vendor.pagination.simple-default')); ?>

            </div>
        </div>
    </div>
</div>




<?php /**PATH /var/www/emasv3/resources/views/livewire/web/products/index.blade.php ENDPATH**/ ?>