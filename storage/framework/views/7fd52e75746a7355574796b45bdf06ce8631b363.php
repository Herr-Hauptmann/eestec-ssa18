<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</head>
<body>
    <div id="app">
        <?php echo $__env->make('admin.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/719876f143.js"></script>
    <script src="<?php echo e(asset('ckeditor5-build-classic/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <?php if(Session::has('permission_missing')): ?>
        <script>
            alert('<?php echo e(Session::get('permission_missing')); ?>');
        </script>
    <?php endif; ?>
    <?php if(Session::has('flash_message')): ?>
        <script>
            alert('<?php echo e(Session::get('flash_message')); ?>');
        </script>
    <?php endif; ?>
</body>
</html>
