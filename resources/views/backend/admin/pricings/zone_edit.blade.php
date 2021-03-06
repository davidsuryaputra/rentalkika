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
            <form method="post" action="{{ route('admin.pricings.zone_update', $zone->id) }}">
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
					<label>Nama Zona</label>
					<input type="text" class="form-control" value="{{ $zone->name }}" name="zone_name">
					
					@if($errors->has('zone_name'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('zone_name') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('cities') ? 'has-error' : '' }}">
					<label>Tentukan Kota</label>
					<select name="cities[]" class="city form-control" data-placeholder="Pilih Kota" style="width: 100%;" multiple="multiple">
					@foreach($cities as $city)
						@if(in_array($city->id, $zoneCityIds))
					    <option value="{{ $city->id }}" selected="true">{{ $city->name }}</option>
					    @else
					    <option value="{{ $city->id }}">{{ $city->name }}</option>
					    @endif 
					@endforeach
					</select>
					
					@if($errors->has('cities'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('cities') }}
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
    $(".city").select2();
  });
</script>
@stop
