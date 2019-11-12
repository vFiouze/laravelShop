@extends('layouts.app')

@section('content')
<script src="{{ asset('js/changeCart.js') }}" defer></script>
<div class="container">
	<h1>Review your cart</h1>
	@if (sizeof($productsInCart)>0)
		<div class="row">
			<div class="col-10">
				<form action="{{ route('cart.update')}}" method="POST">
					@csrf
					<table class="table table-striped">
						<thead>
						    <tr>
						      	<th scope="col">Name</th>
						      	<th scope="col">Quantity</th>
						     	<th scope="col">Price</th>
						     	<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total=0
							@endphp
							@foreach ($productsInCart as $product)
								<tr>
									<td><a href="{{ route('product.show',$product->id) }}">{{$product->name}}</a></td>
								 	<td>
								 		<select name={{"quantity".$product->id}}>
								 			@for ($i = 0; $i <= 20; $i++)
								 				<option {{$i==$product->quantity ? 'selected' : ''}} >{{$i}}</option>
								 			@endfor
								 		</select>
								 	</td>
									<td>{{$product->price}}</td>
								  	<td>{{$product->price * $product->quantity}}</td>
								  	@php
								  		$total=$total+$product->price * $product->quantity
								  	@endphp
								</tr>
							@endforeach

							<tr>
								<td></td>
								<td colspan="1"><button type="submit" class ="btn btn-sm btn-primary">Update quantites</button></td>
								<td colspan="1">Total</td>
								<td colspan="1">
									@php
										echo $total
									@endphp
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<div class="col-2">
				<button type="submit" class="btn btn-primary btn-lg">Checkout<i class="fas fa-dollar-sign ml-3"></i></button>
			</div>
		</div>
	@else
		Cart empty! <a href="{{ route('product.index') }}">Go shopping</a>
	@endif
	
</div>
@endsection