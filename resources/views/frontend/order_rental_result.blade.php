@extends('layouts.app')


@section('content')

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Single Project.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<!-- *****************************************************************************************************************
	 TITLE & CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mt">
	 	<div class="row">
	 		@foreach($vehicles as $vehicle)
	 		<div class="col-md-3">
	 		<div class="thumbnail">
	 			<img src="{{ url('images/'.$vehicle->photo) }}" width="320" height="240">
	 			<div class="caption">
	 				<p>
	 				{{ $vehicle->car->brand->name.' '.$vehicle->car->car_class->name.' '.$vehicle->car->name }}</br>
		 			{{ $vehicle->year }}</br>
		 			{{ $vehicle->license_plate }}</br>
		 			{{ $vehicle->partner->user->full_name}}</br>
	 				</p>
	 			<p>
	 			<a href="{{ route('customer.order_rental.detail', $vehicle->id) }}" class="btn btn-default">Detail</a>
	 			</p>
	 			</div>
	 			
	 		</div>
	 			
	 				 		
	 		</div>
	 		@endforeach
	 	</div><! --/row -->
	 </div><! --/container -->
	 
@stop