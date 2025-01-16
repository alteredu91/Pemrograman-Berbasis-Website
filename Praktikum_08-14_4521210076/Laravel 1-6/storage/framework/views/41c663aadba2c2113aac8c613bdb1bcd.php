<a <?php echo e($attributes); ?>

    class="<?php echo e(request()->fullurlis($href) ? "bg-zinc'-700 text-white" : "text-zinc-300 hover:bg-zinc-800 hover:text-white"); ?> rounded-md px-3 py-2 text-sm font-medium ">
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\Users\ASUS\Herd\belajar_laravel\resources\views/components/navbar/dropdown-item.blade.php ENDPATH**/ ?>