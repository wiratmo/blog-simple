<div class="form-group{{ $errors->has($nameInput) ? ' has-error' : '' }}">
    <label for="{{$nameInput}}" class="col-md-4 control-label" style="text-transform: capitalize;">{{$inputDescription}}</label>

    	<textarea class="form-control" rows="5" id="{{$nameInput}}" name="{{$nameInput}}" {{$required}}>{{$type == 'create'? old("$nameInput") : $value}}</textarea>

        @if ($errors->has($nameInput))
            <span class="help-block">
                <strong>{{ $errors->first($nameInput) }}</strong>
            </span>
        @endif
</div>