<div class="row">
    @foreach($permissions as $type => $data)
        <div class="col-md-12">
            <h3 style="color: #5bc0de;">{{ $type }}</h3>
            @foreach ($data as $permission)
                <div class="col-md-4">
                    <label for="permissions[{{ $permission }}]">
                        <input name="permissions[{{ $permission }}]" type="checkbox" id="permissions[{{ $permission }}]"
                            {{ $user->hasPermissionTo($permission) ? 'checked ' : '' }}
                            {!! $directPermissions->contains($permission) ? 'disabled' : '' !!}>
                        {{ $permission }}
                    </label>
                </div>
            @endforeach
        </div>
        <br/>
        <br/>
    @endforeach
</div>
<div class="row" style="margin-top: 15px;">
    <div class="col-md-offset-4 col-md-4 col-xs-offset-2 col-xs-8">
        <button class="btn btn-primary btn-block" type="submit"
                @if(Auth::user()->id === $user->id) onclick="return confirm('Sigurno zelis sebi promijeniti permisije?')" @endif>Spasi</button>
    </div>
</div>