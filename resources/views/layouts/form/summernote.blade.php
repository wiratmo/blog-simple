<div class="form-group{{ $errors->has($nameInput) ? ' has-error' : '' }}">
    

    	<textarea class="summernote" rows="5" id="{{$nameInput}}" name="{{$nameInput}}" {{$required}}>{{$type == 'create'? old("$nameInput") : $value}}</textarea>

        @if ($errors->has($nameInput))
            <span class="help-block">
                <strong>{{ $errors->first($nameInput) }}</strong>
            </span>
        @endif
</div>