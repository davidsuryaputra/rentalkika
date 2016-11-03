@extends('layouts.app')
@section('title', 'Register Company')
@section('content')
<!--BEGIN CONTENT-->
  <div id="content">
    <div class="content">
      <div class="breadcrumbs">
        <a href="#">Home</a>
        <img src="images/marker_2.gif" alt=""/>
        <span>Register</span>
      </div>
      <div class="main_wrapper">
        <div class="sell_box sell_box_5">
          <h2><strong>Customer</strong> details</h2>

          @if(Session::has('success'))
            <h4>{{ Session::get('success') }}</h4>
          @endif
          @foreach($errors->all() as $error)
            <h4><p class="error">{{ $error }}</p></h4>
          @endforeach
          <br/>
          <form name="register" method="post" action="{{ url('/register_company') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

			<div id="company">
		  	<div class="input_wrapper">
	            <label><span>* </span><strong>Nama Perusahaan: </strong></label>
	            <input type="text" class="txb" value="" name="full_name"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Alamat Kantor: </strong></label>
	            <input type="text" class="txb" value="" name="address"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Telepon Kantor: </strong></label>
	            <input type="text" class="txb" value="" name="phone"/>
	          </div>
	          
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Nama Direktur:</strong></label>
	            <input type="text" class="txb" name="nama_direktur"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Upload Identitas Direktur (KTP/SIM):</strong></label>
	            <input type="file" class="txb" name="ktp_direktur"/>
	          </div>
	          
	          <div class="input_wrapper">
	            <label><span>* </span><strong>NPWP Kantor:</strong></label>
	            <input type="file" class="txb" name="npwp_kantor"/>
	          </div>
	          
  			  <div class="input_wrapper">
	            <label><span>* </span><strong>Surat Tugas Kantor:</strong></label>
	            <input type="file" class="txb" name="surat_kantor"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>E-mail: </strong></label>
	            <input type="text" class="txb" value="" name="email"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Password:</strong></label>
	            <input type="password" class="txb" value="" name="password"/>
	          </div>
	
	          <div class="input_wrapper last">
	            <label><span>* </span><strong>Password Confirmation:</strong></label>
	            <input type="password" class="txb" name="password_confirmation"/>
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
            <input type="submit" value="Submit" class="sell_submit"/>
            <div class="clear"></div>
          </div>
          </form>
        </div>


      </div>
    </div>
  </div>
<!--EOF CONTENT-->
@endsection
