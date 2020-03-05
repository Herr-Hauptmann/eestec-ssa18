@extends('layouts.home')
@section('content')
<div class="container-fluid kontaktAll">

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <div>
                <form class = "lijepa-forma"action="{{ route('posalji-mail') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                
                                <label for="name">
                                    Ime i prezime*</label>
                                <input type="text" class="form-control{{ $errors->has('ime') ? ' has-error' : ''}}" id="name" name="ime" minlength="3" value="{{ old('ime') }}" autofocus required/>
                         
                                    <p class="error"></p>
                                
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email*</label>
                                <input type="email" class="form-control " id="email" name="email" value="{{ old('email') }}" required="" />
                                
                                    <p class="error"></p>
                                
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Poruka*</label>
                                <textarea name="poruka" id="message" class="form-control " rows="7" cols="25" required>{{ old('poruka') }}</textarea>
                                
                                    <p class="error"></p>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
                                Pošalji</button>
                        </div>
                    </div>
                </form>
            </div>
            @if ($message = Session::get('success'))
                <p class="confMessage">{{ $message }}</p>
            @endif
        </div>
        <div class="col-md-6 oo">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Organizacioni odbor</legend>

                <div class="row">
                    @foreach ($kontakti as $kontakt)
                    <div class="col-md-6">
                        <address>
                            <strong>{{ $kontakt->ime . ' ' . $kontakt->prezime }}</strong><br>
                            {{ $kontakt->pozicija }}<br>
                            <label class="gr">{{ $kontakt->email }}<br>
                                <abbr title="Phone">
                                </abbr>
                                {{ $kontakt->telefon}}</label>
                        </address>

                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection