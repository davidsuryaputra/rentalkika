@extends('layouts.app')

@section('style')
  @parent
  <!-- Select2 -->
  <!--<link rel="stylesheet" href="{{ url('plugins/select2/select2.min.css') }}">-->
<!--  
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  -->
  <link rel="stylesheet" href="{{ url('plugins/bootstrap-datetimepicker.min.css') }}">
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
			
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Rincian harga {{ $kendaraan->license_plate }}</h4></div>
				<div class="panel-body">
				
				<form action="{{ route('customer.order_rental.konfirmasi', $tr_sewa->id) }}" method="post">
				{{ csrf_field() }}
				<img src="{{ url('images/'.$kendaraan->photo) }}" alt="">
				<div class="form-group">
					<label>Provider rental</label>
					{{ $kendaraan->partner->user->full_name }}
				</div>
				
				<div class="form-group">
					<label>Lokasi Pool</label>
					{{ $kendaraan->partner->alamat_pool }}
				</div>
				
				<div class="form-group">
					<label>Lokasi Mobil</label>
					{{ $kendaraan->partner->city->name }}
				</div>
				
				<div class="form-group">
					<label>Di ambil di pool</label>
					<select name="ambil_pool" class="form-control">
						<option value="">Pilih</option>
						<option value="1">Ya</option>
						<option value="0">Tidak, kirim ke alamat saya</option>
					</select>
				</div>
				
				<div class="form-group alamat_pengiriman" style="display: none;">
					<label>Alamat Anda</label>
					<input type="text" class="form-control" name="alamat_pengiriman">
					Mobil akan dikirim ke alamat sebelum jam keberangkatan
				</div>
				
				<div class="form-group">
					<label>Informasi</label>
					<br /><br />
					<label>Tanggal Sewa</label>
					<input type="text" value="{{ $tanggal_sewa->format('d/m/Y H.i') }}" class="form-control" name="tanggal_sewa" readonly="">
					<br /><br />
					<label>Tanggal Pengembalian</label>
					<input type="text" value="{{ $tanggal_pengembalian->format('d/m/Y H.i') }}" class="form-control" name="tanggal_pengembalian" readonly="">
					<br /><br />
					<label>Tujuan Sewa</label>
					<input type="text" value="{{ $tujuan_sewa->name }}" class="form-control" name="tujuan_sewa" readonly="">
					<br /><br />
					<label>Lama Sewa (Jam)</label>
					<input type="text" value="{{ $lama_sewa }}" class="form-control" name="lama_sewa" readonly="">
					<br /><br />
					<label>Tarif Dasar</label>
					{{ $dasar }} per 14 jam * {{ $lama_sewa / 14 }} = {{ $dasar_sewa }}
					<input type="hidden" name="dasar_sewa" value="1" />
					<br /><br />
					<label>Tarif Sopir</label>					
					@if( $is_sopir == '1') {{ $sopir }} @else 0 @endif per jam * {{ $lama_sewa }} = {{ $sopir_sewa }}
					<input type="hidden" name="sopir_sewa" @if($sopir_sewa != 0) value="1" @else value="0" @endif> 
					<br /><br />
					<label>Luar Kota</label>
					@if( $is_luar_kota == '1') {{ $luar_kota }} @else 0 @endif per jam * {{ $lama_sewa }} = {{ $luar_kota_sewa }}
					<input type="hidden" name="luar_kota" value="{{ $is_luar_kota }}">
					<br /><br />
					<label>Biaya overtime (bila terlambat mengembalikan)</label>
					{{ $overtime }} per jam
					<br /><br />		
					<label>Total</label>
					{{ $total }}
					<input type="hidden" value="{{ $total }}" name="total" />
					<br /><br />
					
					
				</div>				
				<a href="{{ route('customer.order_rental') }}" class="btn btn-default">Kembali</a>
				<input type="submit" value="Order" class="btn btn-default">				
				</form>
				
				</div>
			</div>			
					 	
	 	</div><! --/row -->
	 </div><! --/container -->
	 
@stop

@section('script')
	@parent
	<!-- Select2 -->
	<script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
	<script src="{{ url('plugins/moment.min.js') }}"></script>
	<!--<script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>-->
	<script src="{{ url('plugins/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ url('plugins/id.js') }}"></script>
	<script>
	$(function () {
		$("select[name='ambil_pool']").on('change', function () {
			if (this.value == 0) {
				$('div .alamat_pengiriman').show();
			}else {
				$('div .alamat_pengiriman').hide();
			}
		});		
	});
	</script>
@stop
	