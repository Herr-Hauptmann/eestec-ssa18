<div class="form-group {{ $errors->has('pozicija') ? 'has-error' : ''}}">
    <label for="pozicija" class="col-md-4 control-label">{{ 'Pozicija' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="pozicija" type="text" id="pozicija" value="{{ $kontakt->pozicija or ''}}" >
        {!! $errors->first('pozicija', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ime') ? 'has-error' : ''}}">
    <label for="ime" class="col-md-4 control-label">{{ 'Ime' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ime" type="text" id="ime" value="{{ $kontakt->ime or ''}}" >
        {!! $errors->first('ime', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prezime') ? 'has-error' : ''}}">
    <label for="prezime" class="col-md-4 control-label">{{ 'Prezime' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="prezime" type="text" id="prezime" value="{{ $kontakt->prezime or ''}}" >
        {!! $errors->first('prezime', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $kontakt->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
