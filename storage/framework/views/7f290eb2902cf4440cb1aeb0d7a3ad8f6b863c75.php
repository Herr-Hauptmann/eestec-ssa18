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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    
    <link href="<?php echo e(asset('css/platform.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</head>
<body>
    <div id="app container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <!-- <script src="https://use.fontawesome.com/719876f143.js"></script> -->
    <script src="<?php echo e(asset('js/jquery.matchHeight.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('.match-height').matchHeight();
        });
    </script>
    <script src="<?php echo e(asset('js/platform.js')); ?>"></script>
</body>
</html>
