<label <?php echo e($attributes->class([ 'input--picture', 'button' ])); ?> for="<?php echo e("pic-$name"); ?>">
    <?php echo e($slot); ?>

</label>
<input
    type="file"
    accept="image/*"
    id="<?php echo e("pic-$name"); ?>"
    name="<?php echo e($name); ?>"
    hidden <?php if($required ?? false): echo 'required'; endif; ?>
/>

<?php /**PATH C:\Users\MAGIC\Desktop\library3\resources\views/components/input/picture.blade.php ENDPATH**/ ?>