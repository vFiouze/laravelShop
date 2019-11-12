@extends('layouts.app')

@section('content')
<div class="container">
 <h1>Editing product {{$product->name}}</h1>
 <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
 	@include('product.form')
 	@method('PATCH')
 	@csrf
 	<button type="submit" class="btn btn-primary">Edit product</button>
 </form>

</div>

@endsection