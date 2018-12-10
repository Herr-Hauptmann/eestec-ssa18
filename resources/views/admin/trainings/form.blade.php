<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Naziv' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $training->title or ''}}" required>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Opis' }}</label>
    <div class="col-md-6">
        <textarea name="description" id="description" type="textarea">{{ $training->description or ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Slika' }}</label>
    <div class="col-md-6">
        <input type="file" name="image" id="image" @if (! isset($training) || (isset($training) && ! $training->image)) required @endif/>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@isset($training)
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-offset-4 col-md-6">
            <img src="{{ asset($training->image) }}" class="img-responsive" />
        </div>
    </div>
@endisset
<div class="form-group {{ $errors->has('trainer_id') ? 'has-error' : ''}}">
    <label for="trainer_id" class="col-md-4 control-label">{{ 'Trener' }}</label>
    <div class="col-md-6">
        {!! Form::select('trainer_id', $trainers->pluck('name', 'id'), old('trainer_id', isset($training) ? $training->trainer->id : null), ['required' => true, 'class' => 'form-control']) !!}
        {!! $errors->first('trainer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Dodaj' }}">
    </div>
</div>

<script>
    $( document ).ready(function () {
        ClassicEditor
        .create( document.querySelector( '#description' ) );
    })
    
</script>