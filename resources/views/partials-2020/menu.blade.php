<nav class="navbar navbar-expand-lg navbar-light bg-none">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img class="logo-img img-responsive" src="{{ asset('img/ssa20/green@2x.png') }}" width=83px />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" id ="navigacioni-meni">
        <li class="nav-item active">
            <a class="nav-link" href="#"> Novosti </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> O nama </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> O Projektu </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> Partneri </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> Mediji </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"> Galerija </a>
        </li>
        <!-- JA BIH OVO IZBACIO.
        <li class="nav-item">
            <a class="nav-link" href="#"> Drugi o nama </a>
        </li>
        -->
        <li class="nav-item">
            <a class="nav-link" href="#"> Kontakt </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"> Login </a>
        </li>
        
        </ul>
    </div>

    <!-- OSTATAK NEMA SMISLA RADITI DOK SE NE ZAVRSE OSTALI BLADE-ovi -->
</nav>