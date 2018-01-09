@extends('layouts.home')
@section('content')
    <div class="marginContainer">
        <div class="container-fluid">

            <div id="album-container">
                @foreach ($albums as $name => $cover)
                <div class="col-lg-4 col-md-6 col-sm-12 col-centered">
                    <div class="album-preview center-block"   >

                        <div class="ih-item square effect6 from_top_and_bottom center-block">

                            <a href="{{ route('album', $name) }}">

                            <div class="img">
                                <img src="{{ asset($cover) }}" />
                            </div>
                            <div class="info">
                                <h3> SSA '{{ substr($name, 2) }}  </h3>
                            </div>


                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection