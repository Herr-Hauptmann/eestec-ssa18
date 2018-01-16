<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Naziv' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', $media->name ?? '')}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="col-md-4 control-label">{{ 'Logo' }}</label>
    <div class="col-md-6">
        <input type="file" name="logo" id="logo" @if (! isset($media) || (isset($media) && ! $media->logo)) required @endif/>
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@isset($media)
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-offset-4 col-md-6">
            <img src="{{ asset($media->logo) }}" class="img-responsive" />
        </div>
    </div>
@endisset
<div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
    <label for="website" class="col-md-4 control-label">{{ 'Website' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="website" type="url" id="website" value="{{ old('website', $media->website ?? '')}}" required>
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="col-md-4 control-label">{{ 'Kategorija' }}</label>
    <div class="col-md-6">
        <select name="category" class="form-control" id="category" required>
    @foreach (['generalni' => 'Generalni', 'obicni' => 'Obicni'] as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($media->category) && $media->category === $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Dodaj' }}">
    </div>
</div>
