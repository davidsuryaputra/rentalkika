@extends('layouts.app')

@section('style')
  @parent
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('plugins/select2/select2.min.css') }}">
@stop


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
		 	
					 	
		 	
		 	<div class="col-lg-5 col-lg-offset-1">
			 <form role="form" method="post" action="{{ route('customer.order_rental.filter') }}">
			 {{ csrf_field() }}
			  
			  
			  
			  <div class="form-group lokasi_mobil_sewa {{ $errors->has('lokasi_mobil_sewa') ? 'has-error' : '' }}">
			  	<label>Lokasi mobil yang ingin disewa</label>
			  	<select class="form-control lokasi_mobil_sewa" name="lokasi_mobil_sewa">
			  		@foreach($cities as $city)
			  		<option value="{{ $city->id }}">{{ $city->name }}</option>
			  		@endforeach
			  	</select>
			  </div>

			  
			  
			  <div class="form-group {{ $errors->has('tahun_mobil') ? 'has-error' : '' }}">
			    <label for="InputSubject1">Pilih Tahun Mobil</label>
			    <select class="form-control tahun" name="tahun_mobil" style="width: 100%;">
			    @foreach($vehicles as $vehicle)
					<option value="{{ $vehicle->year }}">{{ $vehicle->year }}</option>
				@endforeach			    
			    </select>
			    
			    @if($errors->has('tahun_mobil'))
					<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('tahun_mobil') }}
					</label>			    
			    @endif
			  </div>
			  
			  <div class="form-group {{ $errors->has('jenis_mobil') }}">
			  	<label for="message1">Pilih Jenis Mobil Sewa</label>
			  	<select class="form-control jenis" name="jenis_mobil" style="width: 100%;">
			  		@foreach($car_classes as $car_class)
					<option value="{{ $car_class->id }}">{{ $car_class->name }}</option>			  		
			  		@endforeach
			  	</select>
			  	
			  	@if($errors->has('jenis_mobil'))
			  		<label class="control-label">
			  		<i class="fa fa-times-circle-o"></i>
			  		{{ $errors->first('jenis_mobil') }}
			  		</label>
			  	@endif
			  </div>
			  <button type="submit" class="btn btn-theme">Filter</button>
			</form>
			</div>
		 	
		 	<!--
		 	<div class="col-lg-4 col-lg-offset-1">
			 	<div class="spacing"></div>
		 		<h4>Project Details</h4>
		 		<div class="hline"></div>
		 		<p><b>Date:</b> April 18, 2014</p>
		 		<p><b>Author:</b> Marcel Newman</p>
		 		<p><b>Categories:</b> Illustration, Web Design, Wordpress</p>
		 		<p><b>Tagged:</b> Flat, UI, Development</p>
		 		<p><b>Client:</b> Wonder Corp.</p>
		 		<p><b>Website:</b> <a href="http://blacktie.co">http://blacktie.co</a></p>
		 	</div>
		 	-->
		 	
	 	</div><! --/row -->
	 </div><! --/container -->
	 
@stop

@section('script')
	@parent
	<!-- Select2 -->
	<script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
@stop
	