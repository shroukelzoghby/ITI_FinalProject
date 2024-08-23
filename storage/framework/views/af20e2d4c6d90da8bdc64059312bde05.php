<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Dashboard - <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" href="<?php echo e(Vite::logo('icon.png')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/css/font-awesome.min.css',
        'resources/js/font-awesome.min.js'
    ]); ?>
</head>
<body>
    <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/layouts/admin.blade.php ENDPATH**/ ?>