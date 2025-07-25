<?php $__env->startSection('title'); ?>
Checkout - Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
Food Store, Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
Checkout - Food Store - Eat Your Favorite Foods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('image'); ?>
<?php echo e(asset('images/logo.png')); ?>

<?php $__env->stopSection(); ?>

<div>
    <div class="container">

        <div class="row justify-content-center mt-0" style="margin-bottom: 320px;">
            <div class="col-md-6">

                <div class="bg-white rounded-bottom-custom shadow-sm p-3 sticky-top mb-3">
                    <div class="d-flex justify-content-start">
                        <div>
                            <?php if (isset($component)) { $__componentOriginalea5f114b4fdbebf113d66a28fd933fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea5f114b4fdbebf113d66a28fd933fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.back','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalea5f114b4fdbebf113d66a28fd933fb5)): ?>
<?php $attributes = $__attributesOriginalea5f114b4fdbebf113d66a28fd933fb5; ?>
<?php unset($__attributesOriginalea5f114b4fdbebf113d66a28fd933fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea5f114b4fdbebf113d66a28fd933fb5)): ?>
<?php $component = $__componentOriginalea5f114b4fdbebf113d66a28fd933fb5; ?>
<?php unset($__componentOriginalea5f114b4fdbebf113d66a28fd933fb5); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card rounded shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-geo-alt mb-1" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            Shipping Information
                        </h6>
                        <hr />

                        

                        <div class="mb-3">
                            <textarea class="form-control rounded" wire:model.live="address" rows="3" placeholder="Address:  Jl. Kebon Jeruk No. 1, Jakarta Barat"></textarea>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container fixed-total">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card rounded shadow-sm border-0 mb-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-0">Total</h6>
                            </div>
                            <div class="ms-auto">
                                <h6 class="mb-0">Rp. <?php echo e(number_format($totalPrice)); ?></h6>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <h5 class="fw-bold mb-0">Grand Total</h5>
                            </div>
                            <div class="ms-auto">
                                <h5 class="fw-bold mb-0">Rp. <?php echo e(number_format($totalPrice)); ?></h5>
                            </div>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($totalPrice > 0): ?>

                            <hr style="border: dotted 1px #e92715;">

                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.checkout.btn-checkout', ['address' => $address,'grandTotal' => $totalPrice,'totalPrice' => $totalPrice]);

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div><?php /**PATH /var/www/emasv3/resources/views/livewire/web/checkout/index.blade.php ENDPATH**/ ?>