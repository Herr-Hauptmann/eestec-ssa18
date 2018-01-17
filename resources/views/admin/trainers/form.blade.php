<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Ime i prezime' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $trainer->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
    <label for="about" class="col-md-4 control-label">{{ 'O treneru' }}</label>
    <div class="col-md-6">
        <textarea name="about" id="about" type="textarea">{{ $trainer->about or ''}}</textarea>
        {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Slika' }}</label>
    <div class="col-md-6">
        <input type="file" name="image" id="image" @if (! isset($trainer) || (isset($trainer) && ! $trainer->image)) required @endif/>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@isset($trainer)
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-offset-4 col-md-6">
            <img src="{{ asset($trainer->image) }}" class="img-responsive" />
        </div>
    </div>
@endisset

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Dodaj' }}">
    </div>
</div>

<script>
    $( document ).ready(function () {
        ClassicEditor
        .create( document.querySelector( '#about' ) );
    })
    
</script>
