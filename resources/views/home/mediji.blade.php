@extends('layouts.home')

@section('content')
    <div class="marginContainer">
        <div class="container-fluid">
            <p class="logoTitle"><b>Generalni web pokrovitelj{{ ($generalni->count() > 1) ? 'i' : '' }} udruženja</b></p>
            <p class="sectionHeadlineBottomRed logosBottomRed"></p>
            <div class="logoContainer center-hv">
                @foreach ($generalni as $item)
                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="{{ $item->website }}" target="_blank">
                            <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }})" }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>



            <p class="logoTitle stepRow"><b>Step-up pokrovitelji</b></p>
            <p class="sectionHeadlineBottomRed logosBottomRed"></p>

            <div class="logoContainer center-hv">

                @foreach ($obicni as $item)
                    <div class="logoDiv-medij col-md-4 col-sm-4 col-xs-6">
                        <a href="{{ $item->website }}" target="_blank">
                            <div alt="{{ $item->name }}" class="div-responsive_img" style="background-image: url({{ asset($item->logo) }})" }}"></div>
                        </a>
                    </div>
                @endforeach
                

            </div>

        </div>

    </div>
@endsection
