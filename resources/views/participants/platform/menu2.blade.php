<nav class="navbar navbar-default mainNavbar mainNavbar1" id="platform-nav">
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
                    <a class="navbar-brand" href="{{ route('home') }}"><img class="logo-img img-responsive" src="{{ asset('img/greenLogo.jpg') }}" /></a>
                </div>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class=" navbar-nav nav navbar-right navbarList">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('participant.login.show') }}">Login</a></li>
                            <li><a href="{{ route('participant.register.show') }}">Registracija</a></li>
                        @else
                            <li><a href="{{ route('participant.edit') }}">Uredi profil</a></li>
                            <li>
                                <a href="{{ route('participant.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('participant.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest

                    </ul>
                </div>


            </div>
        </div>

    </div>
</nav>