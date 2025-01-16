<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device -width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        <?php if(isset($title)): ?>
            <?php echo e($title); ?> / Laravel 11
        <?php else: ?>
            Laravel     11
        <?php endif; ?>
    </title>
    </head>
    <body class="h-full">
<div class="min-h-full">
    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
    <?php if(isset($heading)): ?>
        <header class="bg-white shadows">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:p-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?php echo e($heading); ?></h1>
            </div>
            </header>
    <?php endif; ?>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php echo e($slot); ?>

      </div>
    </main>
  </div>
      </div>
    </main>
  </div>
    </body>
</html>
<?php /**PATH C:\Users\ASUS\Herd\belajar_laravel\resources\views/components/app-layout.blade.php ENDPATH**/ ?>