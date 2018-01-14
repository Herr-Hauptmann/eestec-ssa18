<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
      <meta property="og:title" content="Soft Skills Academy Sarajevo '18" />
      <meta property="og:description" content="Soft Skills Academy Sarajevo - Besplatna trodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu" />
      <meta property="og:image" content="{{ asset('img/greenLogo.jpg') }}" />
      <meta property="og:url" content="." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon.png') }}"/>

    <!-- Styles -->
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clanak.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kontakt.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediji.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prijava.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/treninzi.css') }}" rel="stylesheet">

    @if(request()->route()->named('galerija'))
        <link href="{{ asset('css/galerija/galerijaMain.css') }}" rel="stylesheet">
        <link href="{{ asset('css/galerija/ihover.min.css') }}" rel="stylesheet">
    @elseif(request()->route()->named('album') || request()->route()->named('dan'))
        <link href="{{ asset('css/galerija/blueimp-gallery.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/galerija/album.css') }}" rel="stylesheet">
        <link href="{{ asset('css/galerija/galerijaMain.css') }}" rel="stylesheet">
        <link href="{{ asset('css/galerija/ihover.min.css') }}" rel="stylesheet">
    @endif

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

    <div>
        @include(request()->route()->named('home') ? 'partials.mainmenu' : 'partials.mainmenu2')
        @yield('content')
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/719876f143.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.redirect.js') }}"></script>
    <script src="{{ asset('js/prijava.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>

    <script src='https://cdn.rawgit.com/yairEO/photobox/master/photobox/jquery.photobox.js'></script>
</body>
</html>
