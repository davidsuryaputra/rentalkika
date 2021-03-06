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
	 	
		  @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            {{ Session::get('success') }}
          </div>
          @endif
          
		 	
		 	<div class="col-lg-5 col-lg-offset-1">
		 	
		 	<form name="register" method="post" action="{{ url('/register_partner') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

		  <div id="personal">
	          <div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
	            <label>Nama Rental: </label>
	            <input type="text" class="form-control" value="" name="full_name"/>
	            
	            @if($errors->has('full_name'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('full_name') }}
				</label>	            
	            @endif
	          </div>
	
	          <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	            <label>Alamat Rental: </label>
	            <input type="text" class="form-control" value="" name="address"/>
	            
	            @if($errors->has('address'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('address') }}
				</label>	            
	            @endif
	          </div>
	
	          <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	            <label>Telepon Rental: </label>
	            <input type="text" class="form-control" value="" name="phone"/>
	            
	            @if($errors->has('phone'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('phone') }}
				</label>	            
	            @endif
	          </div>
	          
	          <div class="form-group {{ $errors->has('kota_pool') ? 'has-error' : '' }}">
	          	<label>Lokasi Pool (Kota)</label>
	          	<select name="kota_pool" class="form-control kota_pool" style="width: 100%">
	          		@foreach($cities as $city)
	          		<option value="{{ $city->id }}">{{ $city->name }}</option>
	          		@endforeach
	          	</select>
	          	
	          	@if($errors->has('kota_pool'))
	          	<label class="control-label">
	          		<i class="fa fa-times-circle-o"></i>
	          		{{ $errors->first('kota_pool') }}
	          	</label>
	          	@endif
	          </div>
	          
	          <div class="form-group {{ $errors->has('alamat_pool') }}">
	          	<label>Alamat Pool</label>
	          	<input type="text" name="alamat_pool" class="form-control">
	          	
	          	@if($errors->has('alamat_pool'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('alamat_pool') }}
				</label>	          	
	          	@endif
	          </div>
	          
	          <div class="form-group {{ $errors->has('layanan_sopir') }}">
				<label>Punya Layanan Sopir</label>
				<select name="layanan_sopir" class="form-control">
					<option value="0">Tidak</option>
					<option value="1">Ya</option>
				</select>	        
				
				@if($errors->has('layanan_sopir'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('layanan_sopir') }}
				</label>  
				@endif
	          </div>
	
	          <div class="form-group {{ $errors->has('ktp_pemilik') ? 'has-error' : '' }}">
	            <label>Upload Identitas Pemilik Rental (KTP/SIM):</label>
	            <input type="file" class="form-control" name="ktp_pemilik"/>
	            
	            @if($errors->has('ktp_pemilik'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('phone') }}				
				</label>	            
	            @endif
	          </div>
	          
	          <div class="form-group {{ $errors->has('nama_pemilik') ? 'has-error' : '' }}">
	            <label>Nama Pemilik Rental:</label>
	            <input type="text" class="form-control" name="nama_pemilik"/>
	            
	            @if($errors->has('nama_pemilik'))
	            <label class="control-label">
	            	<i class="fa fa-times-circle-o"></i>
	            	{{ $errors->first('nama_pemilik') }}
	            </label>
	            @endif
	          </div>
	
	          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	            <label>E-mail:</label>
	            <input type="text" class="form-control" value="" name="email"/>
	            
	            @if($errors->has('email'))
	            <label class="control-label">
	            	<i class="fa fa-times-circle-o"></i>
	            	{{ $errors->first('email') }}
	            </label>
	            @endif
	          </div>
	
	          <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
	            <label>Password:</label>
	            <input type="password" class="form-control" value="" name="password"/>
	
	            <label>Password Confirmation:</label>
	            <input type="password" class="form-control" name="password_confirmation"/>
	            
	            @if($errors->has('password'))
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('password') }}
				</label>	      
	            @endif
	          </div>
	
          </div>

          <div class="clear"></div>

          <div class="sell_submit_wrapper">
            <!--
            <span class="custom_chb_wrapper fL">
              <span class="custom_chb">
                <input type="checkbox" name=""/>
              </span>
              <label>I agree to the Terms and Conditions</label>
            </span>
          -->
            <input type="submit" value="Submit" class="btn btn-theme"/>
            <div class="clear"></div>
          </div>
          </form>
          
	 	</div><! --/row -->
	 </div><! --/container -->
	 
@stop
