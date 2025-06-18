<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://raw.githubusercontent.com/SantriKoding-com/assets-food-store/refs/heads/main/images/logo.png" type="image/x-icon">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <meta name="author" content="Food Store">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta content="<?php echo $__env->yieldContent('title'); ?>" property="og:title">
    <meta content="<?php echo $__env->yieldContent('description'); ?>" property="og:description">
    <meta content="<?php echo $__env->yieldContent('image'); ?>" property="og:image">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <script src="https://kit.fontawesome.com/c88cf729d4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
     
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <style>
        .bg-orange {
    background-color: #FF6600 !important;
}

    .button-detail-product{
        display: flex; 
        flex-wrap: wrap;
        margin-inline-end: none;
        align-items: flex-end;
    }
    .text-truncate-multiline {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2; /* Ubah ke 3 jika ingin maksimal 3 baris */
    }

    .btn-cart-custom {
    background-color: white;
    border: 1px solid #FFA500;
    color: #FFA500;
    transition: background-color 0.3s, color 0.3s;
}

.btn-cart-custom:hover {
    background-color: #FFA500;
    color: white;
}

    .sidebar-item {
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.375rem;
        transition: background-color 0.3s, color 0.3s;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .sidebar-item:hover,
    .sidebar-item.active {
        background-color: white;
        color: black;
    }

    .sidebar-item a {
        color: inherit;
        text-decoration: none;
        flex-grow: 1;
    }

    .sidebar-item:hover a,
    .sidebar-item.active a {
        color: black;
    }

</style>
</head>
<body>
    
    
    <?php if(!Request::is('login') && !Request::is('register')): ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.home.header', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-404030868-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>
   

    <!-- render content -->
    <?php echo e($slot); ?>

    <!-- end render content -->

    <?php if(!Request::is('login') && !Request::is('register')): ?>
    <?php if (isset($component)) { $__componentOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.menus.wangsaff','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menus.wangsaff'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb)): ?>
<?php $attributes = $__attributesOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb; ?>
<?php unset($__attributesOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb)): ?>
<?php $component = $__componentOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb; ?>
<?php unset($__componentOriginal2c2133feb48a0ac4dfdbdb2fdd4dc2cb); ?>
<?php endif; ?>
    
    <?php endif; ?>

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script>
        <?php if(session()->has('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>', 'BERHASIL!'); 
        <?php elseif(session()->has('info')): ?>
            toastr.info('<?php echo e(session('info')); ?>', 'INFO!');
        <?php elseif(session()->has('warning')): ?>
            toastr.warning('<?php echo e(session('warning')); ?>', 'PERINGATAN!');
        <?php elseif(session()->has('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>', 'GAGAL!'); 
        <?php endif; ?>
    </script>
</body>
</html><?php /**PATH /var/www/emasv3/resources/views/components/layouts/app.blade.php ENDPATH**/ ?>