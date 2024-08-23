<section <?php echo e($attributes->class([ 'book__cover__container' ])); ?>>
     <?php if(!isset($cover) || is_null($cover)): ?>
        <img
            class="book__cover"
            src="<?php echo e(Vite::image('book-opened.webp')); ?>"
            alt="Book cover"
        />
    <?php else: ?>
        <img
            class="book__cover"
            src="<?php echo e(asset("storage/images/book_images/$cover")); ?>"
            alt="Book cover"
        />
    <?php endif; ?>
</section>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/components/book/cover.blade.php ENDPATH**/ ?>