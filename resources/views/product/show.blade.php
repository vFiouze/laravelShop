@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Information on : {{$product->name}}</h1>
	@can('update', $product)
		<a href="{{ route('product.edit',$product->id) }}">Edit product</a>
	@endcan
	<div class="row">
		<div class="col-10">
			<table class="table table-striped">
				<tbody>
					<tr>
				  		<th scope="row">Product</th>
						<td>{{$product->name}}</td>
					</tr>
					<tr>
					 	<th scope="row">Description</th>
					 	<td>{{$product->description}}</td>
					</tr>
					<tr>
					  	<th scope="row">Price</th>
					  	<td>{{$product->price}}</td>
					</tr>
					<tr>
					  	<th scope="row">Rating</th>
					  	<td>{{$product->rating}}</td>
					</tr>
					<tr>
					  	<th scope="row">Image</th>
					  	<td><img src="{{ asset('storage/'.$product->image) }}"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-2">
			<form method="POST" action={{ route('cart.add') }}>
				@csrf
				<input type="text" name=productId value={{$product->id}} style='display:none'>
				<div class="form-group">
					
				   	<select class="form-control" id="quantity" name="quantity">
				   		<option disabled="disabled" value="">Quantity</option>
				     	<option>1</option>
				      	<option>2</option>
				      	<option>3</option>
				      	<option>4</option>
				      	<option>5</option>
				    </select>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Add to cart  <i class="fas fa-cart-plus"></i></button>
			</form>
		</div>
	</div>
</div>

@endsection