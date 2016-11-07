@extends('backend.layouts.adminMenu')

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
      Admin
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

    <!-- Main content -->
  <section class="content">
    <div class="row">
          <div class="col-xs-12">
            <form method="post" action="{{ route('admin.pricings.sewa_update', $harga_sewa->id) }}">
            {{ csrf_field() }}
            <div class="box">
            <!--
              <div class="box-header">
                <h3 class="box-title">Tentukan Kota</h3>
                <div class="box-tools">
                </div>
              </div>
              -->
              <!-- /.box-header -->
              <div class="box-body">
              
				<div class="form-group {{ $errors->has('zone_name') ? 'has-error' : '' }}">
					<label>Zona</label>
					<select name="zone_name" class="form-control zone" style="width: 100%">
						@foreach($zones as $zone)	
						@if($zone->id == $harga_sewa->zone_id)					
						<option value="{{ $zone->id }}" selected>{{ $zone->name }}</option>
						@else
						<option value="{{ $zone->id }}">{{ $zone->name }}</option>
						@endif						
						@endforeach
					</select>					
					
					@if($errors->has('zone_name'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('zone_name') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('car_class') ? 'has-error' : '' }}">
					<label>Kelas Mobil</label>
					<select name="car_class" class="car_class form-control" style="width: 100%;">
					@foreach($car_classes as $car_class)
					@if($car_class->id == $harga_sewa->car_class_id)
					<option value="{{ $car_class->id }}" selected>{{ $car_class->name }}</option>
					@else
					<option value="{{ $car_class->id }}">{{ $car_class->name }}</option>
					@endif					
					@endforeach
					</select>
					
					@if($errors->has('car_class'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('car_class') }}
	                </label>
	                @endif
				</div>
				
				<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
					<label>Keterangan</label>
					<select name="keterangan" class="keterangan form-control" style="width: 100%;">
					<option value="sopir" {{ $harga_sewa->keterangan == 'sopir' ? 'selected' : '' }}>Tarif sopir per jam</option>
					<option value="luar kota" {{ $harga_sewa->keterangan == 'luar kota' ? 'selected' : '' }}>Tarif luar kota per jam</option>
					<option value="overtime" {{ $harga_sewa->keterangan == 'overtime' ? 'selected' : '' }}>Tarif overtime per jam</option>
					<option value="dasar" {{ $harga_sewa->keterangan == 'dasar' ? 'selected' : '' }}>Tarif dasar per 14 jam</option>
					</select>
				</div>				
				
				<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
					<label>Harga</label>
					<input type="text" class="form-control" value="{{ $harga_sewa->value }}" name="value">
					
					@if($errors->has('value'))
					<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					{{ $errors->first('value') }}
					</label>
					@endif
				</div>
					
              </div>
              <!-- /.box-body -->
			  <div class="box-footer">
				<input type="submit" value="Update" class="btn btn-info">   				
			  </div>
             </div>
             </form>
            <!-- /.box -->
            

            <!-- /.box -->
			  	        
          </div>
        </div>
  </section>

  <!-- /.content -->
  
</div>

  <!-- /.content-wrapper -->

@endsection

@section('script')
	@parent
  <!-- Select2 -->
  <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>

  <script>
  $(function () {
    $(".zone").select2();
    $(".car_class").select2();
    $(".keterangan").select2();
  });
</script>
@stop
