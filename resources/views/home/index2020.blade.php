@extends('layouts.home2020')

@section('head')
    {{-- OVDJE KUCATE SVE STO JE POTREBNO U HEADU VASEG BLADE-A, A NIJE UKLJUCENO U views/layouts/home2020.blade.php --}}
    {{-- <link href="{{ asset('css/ime-filea.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link  href="{{ asset('css/ssa-2020/style.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/o-nama.css')}}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/o-projektu.css')}}" rel="stylesheet">
@endsection

@section('content')
    {{-- blade komponente koje se nalaze u resources/views/2020_partials/ folderu se dodaju na sljedeci nacin --}}
    {{-- @include('ime-filea')  --}}
    {{-- NPR @include('partials-2020.naslovna_traka')   --}}
    @include('partials-2020.menu')
    <!-- <p style="font-size:60px; font-family:Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:#E52A30">
       Ako vidite ovaj tekst, onda sve radi kako treba :)
    </p> -->
<<<<<<< HEAD
    @include('partials-2020.welcome')
    @include('partials-2020.o-projektu')
=======
    {{-- @include('partials-2020.welcome') --}}
    
>>>>>>> bfe7840725f7c77b7fcbf19ad873db13d62d72b3
    @include('partials-2020.o-nama')
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @include('partials-2020.o-radionicama')
    
@endsection
