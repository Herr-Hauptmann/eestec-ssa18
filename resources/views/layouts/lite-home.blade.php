<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Soft Skills Academy LITE '20" />
    <meta property="og:description" content="Soft Skills Academy Sarajevo LITE - Besplatna dvodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu" />
    <meta property="og:image" content="{{ asset('img/greenLogo.jpg') }}" />
    <meta property="og:url" content="." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- CSS FILEOVI SE DODAJU KAO NA LINIJI ISPOD. nalaze se u public/css/ folderu --}}
    {{-- <link href="{{ asset('css/ime-filea.css') }}" rel="stylesheet"> --}}

    @yield('head')

    @if(request()->route()->named('galerija'))
    <link href="{{ asset('css/galerija/galerijaMain.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galerija/ihover.min.css') }}" rel="stylesheet">
    @elseif(request()->route()->named('album') || request()->route()->named('dan'))
    <link href="{{ asset('css/galerija/blueimp-gallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galerija/album.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galerija/galerijaMain.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galerija/ihover.min.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('css/galerija/galerijaMain.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galerija/ihover.min.css') }}" rel="stylesheet">
    

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/ssa20/top-btn.js')}}"></script>

</head>

<body>
        @yield('content')



    @if (Session::has('closed'))
    <script>
        alert('Prijave su zatvorene');
    </script>
    @endif

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
    <script src="https://kit.fontawesome.com/4c9ea8fa84.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.redirect.js') }}"></script>
    <script src="{{ asset('js/prijava.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>

    <script src='https://cdn.rawgit.com/yairEO/photobox/master/photobox/jquery.photobox.js'></script>

</body>

</html>