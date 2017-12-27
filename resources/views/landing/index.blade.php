@extends('layouts.landing')

@section('content')
    @include('partials.title')
    @include('partials.secondarymenu')
    @include('posts.landing')
    @include('partials.onama')
    @include('partials.timeline')
    @include('partials.oprojektu')
    @include('partials.drugionama')
    @include('partials.raspored')
    @include('partials.participanti')
@endsection
