@extends('layouts.app')

@section('content')
	<script type="text/javascript" src="{{ asset('js/customerProfile.js') }}"></script>
	<div class="container" id="container">
		<div class="accordion">
			<div class="card">
				<div class="card-header" id="headingAddress">
					<h2 class="mb-0">
				    	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAddress">
				          Address
				  		</button>
				    </h2>
				</div>
				<div id="collapseAddress" aria-labelledby="headingAddress" data-parent="#container">
					@forelse ($addresses as $add)
						<div class="card-body">
									<div  id="collapseAddress{{$add->id}}">
										<form method="POST" action={{ route('address.update',$add->id) }}>
											@csrf
		  									@method('PATCH')
		  									<div class="row">
		  										<div class="col-12">
		  											@include('customer.addressForm',['address'=>$add->address,'zip'=>$add->zip,'town'=>$add->town,'geodivaddresse'=>$add->geodiv,'country'=>$add->country,'id'=>$add->id,'default'=>$add->default])
		  										</div>
		  										
		  									</div>
		  									<div class="row">
		  										<div class="col-9">
		  											<input type="hidden" name="id" value="{{$add->id}}">
		  											<button type="submit" class="btn btn-success">Update<i class="fa fa-refresh ml-2" aria-hidden="true"></i></button>
		  										</div>
		  										<div class="col-2">
		  											<button form ="deleteaddress{{$add->id}}" type="submit" class="btn btn-danger float-right">Delete<i class="fas fa-trash-alt ml-2"></i></button>
		  										</div>
		  									</div>
										</form>
										<form id="deleteaddress{{$add->id}}" method="POST" action="{{ route('address.delete',$add->id) }}">
											@method('DELETE')
											@csrf
											<input type="hidden" name="id" value="{{$add->id}}">
										</form>
									</div>
								
							
							<hr>
							
							@if ($loop->last)
								Or add a new one
								<form method="POST" action={{ route('address.store')}}>
									@csrf
									<div class="row">
										<div class="col-12">
											@include('customer.addressForm',['address'=>'','zip'=>'','town'=>'','geodivaddresse'=>'','country'=>'','id'=>'99','default'=>''])
										</div>
									</div>
									<div class="row">
										<div class="col-9">
											
											<button type="submit" class="btn btn-success">Save<i class="ml-2 fas fa-save"></i></button>
										</div>
									</div>
							</form>
							@endif
							
						</div>
					@empty
					<div class="card">
						<div class="card-body">
							<form method="POST" action={{ route('address.store')}}>
									@csrf
									<div class="row">
										<div class="col-12">
											@include('customer.addressForm',['address'=>'','zip'=>'','town'=>'','geodivaddresse'=>'','country'=>'','id'=>'99','default'=>''])
										</div>
									</div>
									<div class="row">
										<div class="col-9">
											
											<button type="submit" class="btn btn-success">Save<i class="ml-2 fas fa-save"></i></button>
										</div>
									</div>
							</form>
						</div>
					</div>
					
					@endforelse
	      		</div>
   			</div>
			<div class="card">
				<div class="card-header" id="headingOrders">
					<h2 class="mb-0">
				    	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="false" aria-controls="collapseOne">
				          Orders
				  		</button>
				    </h2>
				</div>
				<div id="collapseOrder" class="collapse" aria-labelledby="headingOrders" data-parent="#container">
	      			<div class="card-body">
				   		Order1
				    </div>
   				 </div>
			</div>
			<div class="card">
				<div class="card-header" id="headingOrders">
					<h2 class="mb-0">
				    	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapseOne">
				          Password reset
				  		</button>
				    </h2>
				</div>
				<div id="collapsePassword" class="collapse" aria-labelledby="headingOrders" data-parent="#container">
	      			<div class="card-body">
				   		@include('customer.passwordChange')
				    </div>
   				 </div>
			</div>
		</div>
	</div>
@endsection
