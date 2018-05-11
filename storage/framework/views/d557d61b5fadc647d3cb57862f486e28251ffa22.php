<nav class="navbar navbar-default mainNavbar mainNavbar1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><img class="logo-img img-responsive" src="<?php echo e(asset('img/whiteLogo1.png')); ?>" /></a>
                </div>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class=" navbar-nav nav navbar-right navbarList">


                        
                        <li><a href="<?php echo e(route('mediji')); ?>">Mediji</a></li>
                        <li><a href="<?php echo e(route('partneri')); ?>"> Partneri</a></li>
                        <li><a href="<?php echo e(route('galerija')); ?>">Galerija</a></li>
                        <li><a href="<?php echo e(route('kontakt')); ?>">Kontakt</a></li>


                    </ul>
                </div>


            </div>
        </div>

    </div>
</nav>