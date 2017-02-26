<div class="form-group{{ $errors->has($nameInput) ? ' has-error' : '' }}">
    <label for="{{$nameInput}}" class="col-md-4 control-label" style="text-transform: capitalize;">{{$inputDescription}}</label>
        <input id="{{$nameInput}}" {{$required ? 'required':''}} type="text" class="form-control" name="{{$nameInput}}" value="{{$type == 'create'? old($nameInput) : $value}}" >

        @if ($errors->has($nameInput))
            <span class="help-block">
                <strong>{{ $errors->first($nameInput) }}</strong>
            </span>
        @endif

</div>