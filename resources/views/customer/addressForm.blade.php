<div class="form-row">
	<div class="form-group col-md-8">
		<label for ="address" class="mr-2">Address</label>
		<input id="address" class="form-control form-control-sm" type="text" name="address" value="{{$address ?? old('address')}}">
		@if ($errors->has('address'))
		    <div class="alert alert-danger">
		        {{$errors->first('address')}}
		    </div>
		@endif
	</div>
	<div class="form-group form-check col-md-3 form-check-inline mt-4">
		<input id="{{$id}}" type="checkbox" class="form-check-input form-control-sm" id="default" onclick="changeCheckbox({{$id}})" name="default" {{$default==1 ? 'checked' : ''}}>
    	<label class="form-check-label" for="exampleCheck1">Default address</label>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-3">
	    <label for="zip">Zip Code</label>
	    <input type="text" class="form-control form-control-sm" id="zip" name="zip" value="{{$zip ?? old('zip')}}">
	    @if ($errors->has('zip'))
		    <div class="alert alert-danger">
		        {{$errors->first('zip')}}
		    </div>
		@endif
	</div>
	<div class="form-group col-md-4">
	    <label for="city">City</label>
	    <input type="text" class="form-control form-control-sm" id="town" name="town" value="{{$town ?? old('town')}}">
	    @if ($errors->has('town'))
		    <div class="alert alert-danger">
		        {{$errors->first('town')}}
		    </div>
		@endif
	</div>
	<div class="form-group col-md-2">
		<label for="geodiv">State</label>
		<select class="form-control form-control-sm" id="geodiv" name="geodiv">
			<option disabled="">Choose</option>
			@foreach ($geodiv as $geo)
				<option {{$geo->geodiv==$geodivaddresse ? 'selected' : ' '}}>{{$geo->geodiv}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-md-2">
	    <label for="country">Country</label>
	    <input type="text" class="form-control form-control-sm" id="country" name="country" value="{{$country ?? old('country')}}">
	    @if ($errors->has('country'))
		    <div class="alert alert-danger">
		        {{$errors->first('country')}}
		    </div>
		@endif
	</div>
</div>

