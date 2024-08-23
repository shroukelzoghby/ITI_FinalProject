<span
    <?php echo e($attributes->class([ 'a' ])); ?>

    onclick="event.preventDefault();
                 document.getElementById('<?php echo e($formId); ?>').submit();">
    <?php echo e($slot); ?>

</span>

<form id="<?php echo e($formId); ?>" action="<?php echo e(route($routeName, $routeParam)); ?>" method="POST" class="d-none">
    <?php echo csrf_field(); ?>
    <?php echo method_field($method); ?>
</form>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/components/button/link.blade.php ENDPATH**/ ?>