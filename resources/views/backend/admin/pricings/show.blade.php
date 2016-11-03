@extends('backend.layouts.adminMenu')

@section('style')
  @parent
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('bootstrap/css/ionicons.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
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
          
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            {{ Session::get('success') }}
          </div>
          @endif
              
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tarif Feeder Zona {{ $zone->name }}</h3>
                <a class="btn btn-primary" href="{{ route('admin.pricings.feeder_create', $zone->id) }}" role="button">Buat Tarif Feeder</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="pricing_feeders" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Dari</th>
                    <th>Ke</th>
                    <th>Tarif per orang</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($pricing_feeders as $pricing_feeder)
                  <tr>
                    <td>{{ $pricing_feeder->route->from_city->name }}</td>
                    <td>{{ $pricing_feeder->route->to_city->name }}</td>
                    <td>{{ $pricing_feeder->value }}</td>
                    <td>
                      <a href="{{ route('admin.pricings.feeder_edit', [$zone->id, $pricing_feeder->id]) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('admin.pricings.feeder_destroy', [$zone->id, $pricing_feeder->id]) }}" role="button" class="btn btn-info">Hapus</a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
                </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tarif Rent Car Zona {{ $zone->name }}</h3>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <form method="post" id="form-rentcar" action="{{ route('admin.pricings.rentcar_store', $zone->id) }}">
              {{ csrf_field() }}
              <div class="box-body">
				
				<div class="form-group {{ $errors->has('short_time') ? 'has-error' : '' }}">
					<label>Tarif per jam (short time max 3 jam)</label>
					<input type="text" class="form-control" name="short_time" @if($rentcar_pricing_exist) value="{{ $short_time->value }}" disabled @endif>

					
					@if($errors->has('short_time'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('short_time') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('normal_time') ? 'has-error' : '' }}">
					<label>Tarif per jam (normal)</label>
					<input type="text" class="form-control" name="normal_time" @if($rentcar_pricing_exist) value="{{ $normal_time->value }}" disabled @endif>
					
					@if($errors->has('normal_time'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('normal_time') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('out_of_town') ? 'has-error' : '' }}">
					<label>Tarif tambahan luar kota per jam </label>
					<input type="text" class="form-control" name="out_of_town" @if($rentcar_pricing_exist) value="{{ $out_of_town->value }}" disabled @endif>
					
					@if($errors->has('out_of_town'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('out_of_town') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('driver') ? 'has-error' : '' }}">
					<label>Tarif sopir per jam</label>
					<input type="text" class="form-control" name="driver" @if($rentcar_pricing_exist) value="{{ $driver->value }}" disabled @endif>
					
					@if($errors->has('driver'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('driver') }}
	                </label>
	                @endif				
				</div>


				<div class="form-group {{ $errors->has('overtime') ? 'has-error' : '' }}">
					<label>Denda overtime per jam</label>
					<input type="text" class="form-control" name="overtime" @if($rentcar_pricing_exist) value="{{ $overtime->value }}" disabled @endif>
					
					@if($errors->has('overtime'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('overtime') }}
	                </label>
	                @endif				
				</div>

              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
              	@if($rentcar_pricing_exist)
              	<button type="button" id="edit-rentcar" class="btn btn-info">Edit</button>
              	<button type="submit" id="update-rentcar" class="btn btn-info" style="display: none;">Update</button>
              	<button type="button" id="cancel" class="btn btn-info" style="display: none;">Cancel</button>
              	<a href="{{ route('admin.pricings.rentcar_destroy', $zone->id) }}" class="btn btn-info ">Hapus Tarif</a> 
              	@else
              	<input type="submit" value="Submit" class="btn btn-info "> 
              	@endif
              </div>
              </form>
            </div>
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
	  <!-- DataTables -->
  <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
  $(function () {
    $('#pricing_feeders').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    
    $('#edit-rentcar').on('click', function (e) {
    	$('#form-rentcar').attr('action', "{{ route('admin.pricings.rentcar_update', $zone->id)}}");
    	$("input[name='short_time']").prop("disabled", false);
    	$("input[name='normal_time']").prop("disabled", false);
    	$("input[name='out_of_town']").prop("disabled", false);
    	$("input[name='driver']").prop("disabled", false);
    	$("input[name='overtime']").prop("disabled", false);
    	$("#edit-rentcar").hide();
    	$("#update-rentcar").show();
    	$("#cancel").show();
    	e.preventDefault();
    	
    });
    
    $('#cancel').on('click', function (e) {
    	$("input[name='short_time']").prop("disabled", true);
    	$("input[name='normal_time']").prop("disabled", true);
    	$("input[name='out_of_town']").prop("disabled", true);
    	$("input[name='driver']").prop("disabled", true);
    	$("input[name='overtime']").prop("disabled", true);
    	$('#form-rentcar').attr('action', "#");
    	$("#edit-rentcar").show();
    	$("#update-rentcar").hide();
    	$("#cancel").hide();
		e.preventDefault();
    });
  });
</script>
@stop
