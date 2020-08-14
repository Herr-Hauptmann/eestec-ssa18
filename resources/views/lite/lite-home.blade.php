@extends('layouts/lite-home')

@section('head')
    {{-- OVDJE KUCATE SVE STO JE POTREBNO U HEADU VASEG BLADE-A, A NIJE UKLJUCENO U views/layouts/home2020.blade.php --}}
    {{-- <link href="{{ asset('css/ime-filea.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link  href="{{ asset('css/ssa-2020/style.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/o-nama.css')}}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/about.css')}}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/o-projektu.css')}}" rel="stylesheet">
    <link  href="{{ asset('css/ssa-2020/kontakt.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/kontakt.css')}}">
    <link  href="{{ asset('css/ssa-2020/novosti.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/organizatori.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/drugi-o-nama.css')}}">
    <link  href="{{ asset('css/ssa-2020/galerija.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/organizatori.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/partneri.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/postignuca.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/menu.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ssa-2020/menu.css')}}">


    <link rel="stylesheet" href="{{ asset('css/lite-ssa/welcome.css')}}">
@endsection

@section('content')
<div class="container-fluid">

    @include('lite.lite-partials.menu')
    @include('lite.lite-partials.welcome')
    @include('lite.lite-partials.o-projektu')
    @include('partials-2020.o-nama')
    {{-- Potrebno izmjeniti radionice, staviti opise i slike --}}
    {{-- @include('partials-2020.o-radionicama') --}}
    @include('lite.lite-partials.partneri')
    @include('partials-2020.postignuca')
    @include('partials-2020.novosti')
    @include('partials-2020.galerija')
    @include('partials-2020.drugi-o-nama')
    @include('partials-2020.kontakt')
    @include('lite.lite-partials.footer')
</div>
@endsection
