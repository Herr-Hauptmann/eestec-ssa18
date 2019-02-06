<div class="form-group {{ $errors->has('ordinal_number') ? 'has-error' : ''}}">
    <label for="ordinal_number" class="col-md-4 control-label">{{ 'Redni broj' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ordinal_number" type="number" id="ordinal_number" value="{{ $year->ordinal_number or ''}}" >
        {!! $errors->first('ordinal_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Dodaj' }}">
    </div>
</div>
