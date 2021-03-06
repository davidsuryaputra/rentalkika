@extends('backend.layouts.adminMenu')

@section('style')
	@parent
	<!-- Select2 -->
  	<link rel="stylesheet" href="{{ url('plugins/select2/select2.min.css') }}"> 
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css') }}">
@endsection

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
    
    <div class="box box-warning">
    <form role="form" action="{{ route('admin.pricings.feeder_store', $zone->id) }}" method="POST">
    		  {{ csrf_field() }}
          <div class="box-header with-border">
            <h3 class="box-title">Buat Tarif Feeder Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

			  
              <!-- text input -->
              <div class="form-group {{ $errors->has('dari_kota') ? 'has-error' : '' }}">
                <label>Dari Kota</label>
                <select class="form-control select2" name="dari_kota">
                	<option>Pilih Kota</option>
                	@foreach($zone->cities as $zone_city)
						<option value="{{ $zone_city->id }}">{{ $zone_city->name }}</option>                	
                	@endforeach
                </select>
				
           		@if($errors->has('dari_kota'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('dari_kota') }}
                </label>
                @endif
                
              </div>
              
              <!-- text input -->
              <div class="form-group {{ $errors->has('ke_kota') ? 'has-error' : '' }}">
                <label>Ke</label>
                <select class="form-control select2" name="ke_kota">
                	<option>Pilih Kota</option>
                	@foreach($zone->cities as $zone_city)
						<option value="{{ $zone_city->id }}">{{ $zone_city->name }}</option>                	
                	@endforeach
                </select>				
           		@if($errors->has('ke_kota'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('ke_kota') }}
                </label>
                @endif
                
              </div>
              
              <!-- text input -->
              <div class="form-group {{ $errors->has('tarif') ? 'has-error' : '' }}">
                <label>Tarif per orang</label>
                <input class="form-control" placeholder="10000" name="tarif" type="text">
				
           		@if($errors->has('tarif'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('tarif') }}
                </label>
                @endif
                
              </div>
              
        	
          </div>
          
           <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          <!-- /.box-body -->
          
           </form>
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
    $(".select2").select2();
  });
</script>
@endsection