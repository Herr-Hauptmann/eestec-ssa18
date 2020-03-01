<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="manji-naslov">
                Meet The Team
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <h1 class="veci-naslov">
                Meet the key people for this year
            </h1>
        </div>
    </div>

    <div class="row slike-oo">
        @foreach ($kontakti as $kontakt)
                    <div class="col-12 col-md-6 col-lg-4 oo-kartica">
                        <div class="picture-div">
                            <img class="oo-img" src="{{asset('img/oo/' . $kontakt->pozicija_short.'.png')}}" alt=" {{$kontakt->pozicija_short}}">
                        </div>
                        
                        <div class="text-center">
                            <br>
                            <h1 class="oo-ime">{{ $kontakt->ime . ' ' . $kontakt->prezime }}</h1>
                            <h2 class="oo-titula">{{ $kontakt->pozicija }}</h2>
                            <h2 class="oo-info">{{ $kontakt->email }}</h2>
                            <h2 class="oo-info">{{ $kontakt->telefon}}</h2>
                            <br><br>
                        </div>
                        
                    </div>
        
        @endforeach
    </div>

</div>