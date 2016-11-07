@extends('backend.layouts.customerMenu')

@section('style')
  @parent
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('plugins/select2/select2.min.css') }}"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css') }}">
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Partner
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

    <!-- Main content -->
  <section class="content">
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Sewa Mobil</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('customer.order_rental.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              
              <!--
               <div class="form-group {{ $errors->has('tanggal_sewa') ? 'has-error' : '' }}">
                <label>Tanggal & Jam Sewa</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime">
                </div>
                -->
                <!-- /.input group -->
             
              
				<!--
           		@if($errors->has('car_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('car_name') }}
                </label>
                @endif
                
              </div>
              -->
              
              
              <div class="form-group {{ $errors->has('plat_nomor') ? 'has-error' : '' }}">
                <label>Plat Nomor</label>
                <input name="plat_nomor" type="text" class="form-control class" style="width: 100%">
				
           		@if($errors->has('plat_nomor'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('plat_nomor') }}
                </label>
                @endif
                
              </div>
              
              <div class="form-group {{ $errors->has('car_year') ? 'has-error' : '' }}">
                <label>Tahun</label>
                <input class="form-control" placeholder="2012" name="car_year" type="text">
				
           		@if($errors->has('car_year'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('car_year') }}
                </label>
                @endif
                
              </div>
              
              <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
              	<label>Foto Mobil</label>
              	<input class="form-control" name="foto" type="file">
              	
              	@if($errors->has('foto'))
				<label class="control-label">
				<i class="fa fa-times-circle-o">
				{{ $errors->first('foto') }}				
				</i>				
				</label>              	
              	@endif
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>
          </div>
          <!-- /.box-body -->
        </div>
  </section>

  <!-- /.content -->
  
</div>

  <!-- /.content-wrapper -->
  
@section('script')
	@parent
  <!-- Select2 -->
  <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>

  <script>
  $(function () {
    $(".car_name").select2();
  });
</script>
@stop
@endsection