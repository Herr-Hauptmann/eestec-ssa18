<nav class="navbar navbar-default mainNavbar mainNavbar1" id="mainNavbar1">
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
                    <a class="navbar-brand" href="{{ route('home') }}"><img class="logo-img img-responsive" src="{{ asset('img/whiteLogo1.png') }}" /></a>
                </div>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class=" navbar-nav nav navbar-right navbarList">


                        {{--<li><a href="{{ route('treninzi-i-treneri') }}">Treninzi i treneri</a></li>--}}
                        <li><a href="{{ route('mediji') }}">Mediji</a></li>
                        <li><a href="{{ route('partneri') }}"> Partneri</a></li>
                        <li><a href="{{ route('galerija') }}">Galerija</a></li>
                        <li><a href="{{ route('kontakt') }}">Kontakt</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Login <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('login') }}">
                                        Admin panel
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ route('participant.login.show') }}">
                                        Participanti
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}">
                                        Kompanije
                                    </a>
                                </li> 
                            </ul>
                        </li>

                    </ul>
                </div>


            </div>
        </div>

    </div>
</nav>