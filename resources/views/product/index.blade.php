@extends('layouts.app')

@section('content')
<div class="container">

	@for ($i = 0; $i <= sizeof($products)-1; $i=$i+3)
		@if ($i%3==0)
			<div class="row">
		@endif
		@for ($j = 0; $j < 3; $j++)
			@if ($i+$j>sizeof($products)-1)
				@php
					break;
				@endphp;
			@endif
			<div class="col-sm-4 pb-2">
				<div class="card" style="width: 18rem;">
					<a href="{{ route('product.show',['product'=>$products[$i+$j]->id]) }}">
  						<img src="{{ asset('storage/'.$products[$i+$j]->image) }}" class="card-img-top">
  						<div class="card-body">
  							<h5 class="card-title">{{$products[$i+$j]->name}}</h5>
			    			<p class="card-text">{{$products[$i+$j]->description}}</p>
			  			</div>
			  		</a>
				</div>
			</div>
		@endfor
		@if ($i%3==0)
			</div>
		@endif
	@endfor		
</div>

@endsection