<div class="form-group">
	<label for="name">Product name</label>
	<input type="text" class="form-control" name='name' id="name" placeholder="Enter product name" value = "{{old('name') ?? $product->name}}">
	@if($errors->has('name'))
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->get('name') as $errorName)
				{{$errorName}}
			@endforeach
		</div>
	@endif
</div>
<div class="form-group">
	<label for="description">Product description</label>
	<input type="text" class="form-control" name='description' id="description" placeholder="Enter product description" value = "{{old('description') ?? "$product->description"}}">
	@if($errors->has('description'))
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->get('description') as $errorDescription)
				{{$errorDescription}}
			@endforeach
		</div>
	@endif
</div>
<div class="form-group">
	<label for="price">Product price</label>
    <input type="text" class="form-control" id="price" name='price' placeholder="Enter product price" value = "{{old('price') ?? "$product->price"}}">
    @if($errors->has('price'))
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->get('price') as $errorPrice)
				{{$errorPrice}}
			@endforeach
		</div>
	@endif
</div>
<div class="form-group">
	<label for="image">Image</label>
	<input type="file" class="form-control-file" id="image" name='image'>
	@if($errors->has('image'))
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->get('image') as $errorImage)
				{{$errorImage}}
			@endforeach
		</div>
	@endif
</div>
