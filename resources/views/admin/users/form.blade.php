<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $user->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="col-md-4 control-label">{{ 'Role' }}</label>
    <div class="col-md-6">
        <select name="role" class="form-control" id="role" required>
    @foreach (['root' => 'Glavni baja', 'organizer' => 'Organizator', 'participant' => 'Participant'] as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ($user->role() !== null && $user->role()->name === $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4 col-xs-offset-2 col-xs-8">
        <button class="btn btn-primary btn-block"  type="submit"
                @if(Auth::user()->id === $user->id) onclick="return confirm('Sigurno zelis sebi promijeniti ulogu?')" @endif>Spasi</button>
    </div>
</div>
