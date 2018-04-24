@extends('layouts.participants')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registracija</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('participant.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ime i prezime</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('email') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-fade" id="registrationModalEmail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" aria-hidden="true">&times;</button> -->
                <h4 class="modal-title">Unesi email sa kojim si se prijavio/la na SSA:</h4>
            </div>
            <form action="{{ route('emailCheck') }}" method="POST" id="checkEmailForm">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="emailTry" class="cool-input" placeholder="Unesi mail .." id="emailTry" autofocus />
                        <span class="help-block" style="display: none;" id="emailTryError"></span>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="submit" class="btn btn-green_fill btn-radius btn-lg" id="checkEmailButton">Dalje</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @php session()->flush('emailRemembered'); @endphp --}}
@if (! session()->has('emailRemembered'))
    <script>
        $('#registrationModalEmail').modal({
            backdrop: 'static',
            keyboard: false
        });
    </script>
@endif
@endsection
