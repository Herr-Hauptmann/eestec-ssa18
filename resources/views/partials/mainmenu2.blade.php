<nav class="navbar navbar-default mainNavbar">
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
                    <a class="navbar-brand" href="./"><img class="logo-img img-responsive" src="{{ asset('img/whiteLogo1.png') }}" /></a>
                </div>
                <div class="collapse navbar-collapse navbarList2" id="navbarCollapse">
                    <ul class=" navbar-nav nav navbar-right navbarList navbarList2 ">


                        <!-- <li><a href="#">Novosti</a></li> -->
                        <li><a href="{{ route('treninzi-i-treneri') }}">Treninzi i treneri</a></li>
                        <li><a href="{{ route('mediji') }}">Mediji</a></li>
                        <li><a href="{{ route('partneri') }}"> Partneri</a></li>
                        <li><a href="{{ route('galerija') }}">Galerija</a></li>
                        <li><a href="{{ route('kontakt') }}">Kontakt</a></li>


                    </ul>
                </div>


            </div>
        </div>

    </div>
</nav>
