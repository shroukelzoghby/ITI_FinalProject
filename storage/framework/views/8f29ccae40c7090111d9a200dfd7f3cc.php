<?php
    $url = Request::url();

    $usersActive         = $url === route('users.index');
    $booksActive         = $url === route('books');
    $authorsActive       = $url === route('authors');
    $rolesActive         = $url === route('roles.index');
    $borrowedBooksActive = $url === route('borrowed-books.index');

    $links = [
        [
            'name' => 'Users',
            'route' => 'users.index',
            'active' => $usersActive
        ],
        [
            'name' => 'Books',
            'route' => 'books',
            'active' => $booksActive
        ],
        [
            'name' => 'Authors',
            'route' => 'authors',
            'active' => $authorsActive
        ],
        [
            'name' => 'Roles',
            'route' => 'roles.index',
            'active' => $rolesActive
        ],
        [
            'name' => 'Borrowed Books',
            'route' => 'borrowed-books.index',
            'active' => $borrowedBooksActive
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

    <div class="nav__right nav__elem--floor" style="margin-bottom: 20px">
        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="nav__a <?php echo e($link['active'] ? 'nav__a--active' : ''); ?>" href="<?php echo e(route($link['route'])); ?>">
                <?php echo e($link['name']); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</nav>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/admin/nav.blade.php ENDPATH**/ ?>