<div class="form-group{{ $errors->has($nameInput) ? ' has-error' : '' }}">
    <label for="{{$nameInput}}" class="col-md-4 control-label" style="text-transform: capitalize;">{{$inputDescription}}</label>
    @if($type == 'create')
    	<select class="form-control tokenizationSelect2" multiple="true" name="{{$nameInput}}">
    		@foreach($values as $value)
    			<option value="{{$value->id}}">{{$value->text}}</option>
    		@endforeach	
    	</select>
    @elseif($type == 'edit')
        <select class="form-control tokenizationSelect2" multiple="true" name="{{$nameInput}}">
            @foreach($values as $value)
                @foreach($selects as $select)
                    @if($value->id == $select->id)
                    <option value="{{$value->id}}" selected>{{$value->text}}</option>
                    @else
                    <option value="{{$value->id}}">{{$value->text}}</option>
                    @endif
                @endforeach
            @endforeach 
        </select>
    @endif

        @if ($errors->has($nameInput))
            <span class="help-block">
                <strong>{{ $errors->first($nameInput) }}</strong>
            </span>
        @endif

</div>