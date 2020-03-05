<div class="container svi_partneri mt-5" id="partneri">

    <div class="row justify-content-center prvi_red pt-5">
        Partneri
    </div>

    @if (count($generalni) > 0)
    <div class="row justify-content-center drugi_red pt-2">
        Generalni godišnji partneri
    </div>
    <div class="row logoContainer center-hv">
        @foreach ($generalni as $item)
        <div class="logoDiv-medij col-md-3 col-4">
            <a href="{{ $item->website }}" target="_blank">
                <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }}) }}"></div>
            </a>
        </div>
        @endforeach
    </div>
    @endif
    <div class="row justify-content-center treci_red pt-2">
        Partneri radionice
    </div>

    <div class="logoContainer center-hv row">
        @foreach ($obicni as $item)
        <div class="logoDiv-medij col-md-2  col-3">
            <a href="{{ $item->website }}" target="_blank">
                <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }})"></div>
            </a>
        </div>
        @endforeach
    </div>
</div>