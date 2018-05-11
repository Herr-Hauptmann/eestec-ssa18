<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
      <meta property="og:title" content="Soft Skills Academy Sarajevo '18" />
      <meta property="og:description" content="Soft Skills Academy Sarajevo - Besplatna trodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu" />
      <meta property="og:image" content="<?php echo e(asset('img/greenLogo.jpg')); ?>" />
      <meta property="og:url" content="." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="shortcut icon" type="image/jpg" href="<?php echo e(asset('img/favicon.png')); ?>"/>

    <!-- Styles -->
    

    <link href="<?php echo e(asset('css/bootstrap-theme.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/clanak.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/kontakt.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/mediji.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/prijava.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/print.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/treninzi.css')); ?>" rel="stylesheet">

    <?php if(request()->route()->named('galerija')): ?>
        <link href="<?php echo e(asset('css/galerija/galerijaMain.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/galerija/ihover.min.css')); ?>" rel="stylesheet">
    <?php elseif(request()->route()->named('album') || request()->route()->named('dan')): ?>
        <link href="<?php echo e(asset('css/galerija/blueimp-gallery.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/galerija/album.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/galerija/galerijaMain.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/galerija/ihover.min.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

</head>
<body>

    <div>
        <?php echo $__env->make(request()->route()->named('home') ? 'partials.mainmenu' : 'partials.mainmenu2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <?php if(Session::has('closed')): ?>
        <script>
            alert('Prijave su zatvorene');
        </script>
    <?php endif; ?>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/719876f143.js"></script>
    <script src="<?php echo e(asset('js/carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.redirect.js')); ?>"></script>
    <script src="<?php echo e(asset('js/prijava.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scroll.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select.js')); ?>"></script>

    <script src='https://cdn.rawgit.com/yairEO/photobox/master/photobox/jquery.photobox.js'></script>

    <script>
        $(document).ready(function () {
            $(document).click(function (event) {
                let clickover = $(event.target);
                let _opened = $(".navbar-collapse").hasClass("in");
                if (_opened === true && !clickover.hasClass("navbar-toggle")) {
                    $("button.navbar-toggle").click();
                }
            });
        });
    </script>
    <script src="<?php echo e(asset('js/jquery.matchHeight.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('.match-height').matchHeight();
        });
    </script>
</body>
</html>
