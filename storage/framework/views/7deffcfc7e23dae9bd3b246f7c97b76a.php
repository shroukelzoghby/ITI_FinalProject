<?php
    $url = Request::url();

    $homeActive     = $url === route('home');
    $profileActive  = $url === route('profile');

    $links = [
        [
            'name' => 'Home',
            'route' => 'home',
            'active' => $homeActive
        ],
        [
            'name' => 'Profile',
            'route' => 'profile',
            'active' => $profileActive
        ],

    ];
?>



<nav class="nav">
   <a href="/" class="nav__left" draggable="false">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </a>


    <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
            <div class="nav__right nav__elem--floor" style="margin-bottom: 20px">
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="nav__a <?php echo e($link['active'] ? 'nav__a--active' : ''); ?>" href="<?php echo e(route($link['route'])); ?>">
                        <?php echo e($link['name']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <a class="nav__a" href="<?php echo e(route('users.index')); ?>">
                        Dashboard
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="nav__right nav__elem--ceil">
                <a class="nav__a" href="<?php echo e(route('login')); ?>">Log in</a>

                <?php if(Route::has('register')): ?>
                    <a class="nav__a" href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</nav>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/nav.blade.php ENDPATH**/ ?>