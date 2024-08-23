<section <?php echo e($attributes->class([ 'book', 'flex' ])); ?>>
    <a href="<?php echo e(route('books.show', $id)); ?>">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.book.cover','data' => ['picture' => $cover ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('book.cover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['picture' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cover ?? null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </a>

    <section class="book__info flex-column margin-left-30px">
        <a
            class="a--text"
            href="<?php echo e(route('books.show', $id)); ?>"
        >
            <span class="book__title"><?php echo e($title); ?></span>
        </a>

        <?php if(isset($describtion) && !is_null($describtion)): ?>
            <span><?php echo e($describtion); ?></span>
        <?php endif; ?>

        <a class="a" href="<?php echo e(route('authors.show', $author->id)); ?>">
            <span class="book__author"><?php echo e($author->name); ?></span>
        </a>

        <section class="margin-top-25px">

        </section>
    </section>

    <section class="margin-left-auto">
        <?php if($available): ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.link','data' => ['formId' => 'borrow-book-'.e($id).'','method' => 'POST','routeName' => 'borrow-book','routeParam' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form-id' => 'borrow-book-'.e($id).'','method' => 'POST','route-name' => 'borrow-book','route-param' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
                Borrow
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <?php endif; ?>
    </section>
</section>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/components/resource/book.blade.php ENDPATH**/ ?>