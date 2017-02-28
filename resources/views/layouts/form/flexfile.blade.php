<div class="form-group{{ $errors->has($nameInput) ? ' has-error' : '' }}">
    <label for="{{$nameInput}}" class="col-md-4 control-label" style="text-transform: capitalize;">{{$inputDescription}}</label>
	    @if($type == 'edit')
	    	<img src="{{url('/storage/icon/'.$value)}}" class="img img-responsive col-md-4">
            <input id="{{$nameInput}}" type="file" class="form-control" name="{{$nameInput}}" value="{{url('/storage/icon/'.$value)}}">
	    @else
            <input id="{{$nameInput}}" type="file" class="form-control" name="{{$nameInput}}" >
        @endif
        

        @if ($errors->has($nameInput))
            <span class="help-block">
                <strong>{{ $errors->first($nameInput) }}</strong>
            </span>
        @endif

</div>