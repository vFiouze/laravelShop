@extends('layouts.app')

@section('content')
<div class="container">
 <h1>Creating a product</h1>
 <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
 	@include('product.form')
 	@csrf
 	<button type="submit" class="btn btn-primary">Create product</button>
 </form>

</div>

@endsection