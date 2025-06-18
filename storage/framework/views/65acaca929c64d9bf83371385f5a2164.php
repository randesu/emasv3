<div class="header-wrapper" style="margin-block-end: 18px">
    <div class="header">
        <!-- Logo -->
        <a href="/" class="nav-link text-dark fw-bold" wire:navigate>
        <div class="header-logo">
            <img src="https://raw.githubusercontent.com/randesu/emasv3/refs/heads/main/public/assets/logobaru3.png" alt="Logo">
            
        </div>
        </a>

        <!-- Search -->
        <div class="header-search">
            <div class="col-10 col-md-16">
                <div class="text-center">
                    <form action="/products" method="GET">
                        <div class="input-group mb-3 rounded">
                            <input type="text" name="search" class="form-control form-control-lg rounded shadow-sm border-0" placeholder="cari yang kamu inginkan..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        <!-- Ikon -->
        
        <div class="header-icons">
            <a href="/cart" class="nav-link text-dark fw-bold" wire:navigate>
                <button><i class="fas fa-shopping-cart"></i></button>
            </a>

            <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('account.my-profile')); ?>" class="nav-link text-dark fw-bold" wire:navigate>
                    <button><i class="fas fa-user"></i></button>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="nav-link text-dark fw-bold" wire:navigate>
                    <button><i class="fas fa-user"></i></button>
                </a>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

    </div>

    <!-- Navigasi -->
    <div class="header-nav" >
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal3742e84c67cd904d7a957f8f0610863e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3742e84c67cd904d7a957f8f0610863e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.category','data' => ['category' => $category]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3742e84c67cd904d7a957f8f0610863e)): ?>
<?php $attributes = $__attributesOriginal3742e84c67cd904d7a957f8f0610863e; ?>
<?php unset($__attributesOriginal3742e84c67cd904d7a957f8f0610863e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3742e84c67cd904d7a957f8f0610863e)): ?>
<?php $component = $__componentOriginal3742e84c67cd904d7a957f8f0610863e; ?>
<?php unset($__componentOriginal3742e84c67cd904d7a957f8f0610863e); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        
    </div>
</div>
<?php /**PATH /var/www/emasv3/resources/views/livewire/web/home/header.blade.php ENDPATH**/ ?>