<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="flex profile__personal-info ">
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.book.cover','data' => ['cover' => $book->cover]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('book.cover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cover' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($book->cover)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>


                    <hr>
                    <br>

                    <div class="user__info">
                        <h2><?php echo e($book->title); ?></h2>
                        <p><strong>Author:</strong> <?php echo e($book->author->name); ?></p>
                        <p><strong>Quantity Available:</strong> <?php echo e($book->available); ?></p>
                        <p><strong>Description:</strong> <?php echo e($book->describtion); ?></p>
                        <br>

                        <a href="<?php echo e(route('home')); ?>" class="button" style="text-decoration: none">Back to Dashboard</a>
                        <br>
                        <br>
                        <?php $roles = [
                        'admin' => 1,
                        'user' => 2,
                        ];?>

                        <?php if(auth()->user()->role_id == $roles['user']): ?>
                            <form action="<?php echo e(route('borrow-book', $book->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button">Borrow Book</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/book.blade.php ENDPATH**/ ?>