<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        @include ('admin.menu')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/719876f143.js"></script>
    <script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @if (Session::has('permission_missing'))
        <script>
            alert('{{ Session::get('permission_missing') }}');
        </script>
    @endif
    @if (Session::has('flash_message'))
        <script>
            alert('{{ Session::get('flash_message') }}');
        </script>
    @endif
</body>
</html>
