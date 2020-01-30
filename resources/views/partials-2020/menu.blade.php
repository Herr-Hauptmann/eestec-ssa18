<nav class="navbar navbar-expand-lg fixed-top menju">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img class="logo-img img-fluid" src="{{ asset('img/ssa20/green@2x.png') }}" width="42px" />
    </a>

    <button class="navbar-toggler dugme" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> Novosti </a>
        </li>
        <li class="nav-item">
            <a class="nav-link navigacioni-meni" href="#o-nama"> O nama </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> O Projektu </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> Partneri </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> Mediji </a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> Galerija </a>
        </li>
        <!-- JA BIH OVO IZBACIO.
        <li class="nav-item">
            <a class="nav-link" href="#"> Drugi o nama </a>
        </li>
        -->
        <li class="nav-item">
            <a class="nav-link disabled navigacioni-meni" href="#"> Kontakt </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active navigacioni-meni" href="{{ route('login') }}"> Login </a>
        </li>
        
        </ul>
    </div>

    <!-- OSTATAK NEMA SMISLA RADITI DOK SE NE ZAVRSE OSTALI BLADE-ovi -->
</nav>