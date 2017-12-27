<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
      <meta property="og:title" content="Soft Skills Academy Sarajevo '17" />
      <meta property="og:description" content="Soft Skills Academy Sarajevo - Besplatna trodnevna radionica ličnih i profesionalnih vještina za studente svih fakulteta u Sarajevu" />
      <meta property="og:image" content="{{ asset('img/greenLogo.jpg') }}" />
      <meta property="og:url" content="." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon.png') }}"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clanak.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kontakt.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediji.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prijava.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/treninzi.css') }}" rel="stylesheet">
</head>
<body>

    <div>
        @include('partials.mainmenu')
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
</body>
</html>
