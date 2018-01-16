@extends('layouts.home')

@section('content')
    <div class="marginContainer">
        <div class="container-fluid">
            <p class="logoTitle"><b>Generalni godišnji partner</b></p>
            <p class="sectionHeadlineBottomRed logosBottomRed"></p>



            <div class="row logoContainer center-hv">
                @foreach ($generalni as $item)
                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="{{ $item->website }}" target="_blank">
                            <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }})" }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="logoTitle"><b>Partneri radionice</b></p>
            <p class="sectionHeadlineBottomRed logosBottomRed"></p>

            <div class="logoContainer center-hv">
                @foreach ($obicni as $item)
                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="{{ $item->website }}" target="_blank">
                            <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }})" }}"></div>
                        </a>
                    </div>
                @endforeach
                    <!-- <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.dzajic-commerce.com/" target="_blank"><img alt="Rauch" class="img-responsive logoImg-medij pad" src="img/partneri/rauch.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.dzajic-commerce.com/" target="_blank"><img alt="Karuzo" class="img-responsive logoImg-medij pad" src="img/partneri/Karuzo.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="https://www.facebook.com/swity.ba/" target="_blank"><img alt="Swity" class="img-responsive logoImg-medij" src="img/partneri/swity.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.sarajevski-kiseljak.com/" target="_blank"><img alt="Sensation" class="img-responsive logoImg-medij pad" src="img/partneri/sensation.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.nestle.ba/brands/nescaf%C3%A9/home" target="_blank"><img alt="Nescafe" class="img-responsive logoImg-medij" src="img/partneri/nescafe.png"></img></a>
                    </div>


                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.meggle.ba/" target="_blank"><img alt="Meggle" class="img-responsive logoImg-medij" src="img/partneri/meggle.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a><img alt="Marbo" class="img-responsive logoImg-medij pad" src="img/partneri/marbo.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://slatkoislano.ba/" target="_blank"><img alt="Slatko i slano" class="img-responsive logoImg-medij" src="img/partneri/ss.png"></img></a>
                    </div>


                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.coca-cola.ba/bs/home/" target="_blank"><img alt="Coca Cola" class="img-responsive logoImg-medij "  src="img/partneri/cola.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://agile.ba/en/" target="_blank"><img alt="Bosnia Agile" class="img-responsive logoImg-medij pad" src="img/partneri/agile.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="https://www.facebook.com/Zutikutak/" target="_blank"><img alt="Žuti kutak" class="img-responsive logoImg-medij" src="img/partneri/zutikutak.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.vitinka.com/" target="_blank"><img alt="Vitinka" class="img-responsive logoImg-medij" src="img/partneri/vitinka.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.princess.com.ba/" target="_blank"><img alt="Princess Tešanj" class="img-responsive logoImg-medij princess" src="img/partneri/princess.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://ba.vitaminka-kreis.com/" target="_blank"><img alt="Vitaminka" class="img-responsive logoImg-medij" src="img/partneri/vitaminka.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://www.igman.co.ba/en/" target="_blank"><img alt="Igman Konjic" class="img-responsive logoImg-medij pad2" src="img/partneri/igman.png"></img></a>
                    </div>

                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="http://sumens.com/" target="_blank"><img alt="Šumens" class="img-responsive logoImg-medij pad2" src="img/partneri/sumens.png"></img></a>
                    </div>
 -->
            </div>

        </div>

    </div>

@endsection
