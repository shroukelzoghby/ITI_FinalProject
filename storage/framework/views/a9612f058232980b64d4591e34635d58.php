<section <?php echo e($attributes->class([ 'user__avatar__container' ])); ?>>
    <?php if(!isset($picture) || is_null($picture)): ?>
        <img class="user__avatar" src="<?php echo e(Vite::image('user.webp')); ?>" alt="Profile picture" />
    <?php else: ?>
        <img class="user__avatar" src="<?php echo e(asset("storage/images/user_images/$picture")); ?>" alt="Profile picture" />
    <?php endif; ?>
</section>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/components/user/picture.blade.php ENDPATH**/ ?>