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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Mobil Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('admin.cars.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              
               <div class="form-group {{ $errors->has('brand_name') ? 'has-error' : '' }}">
                <label>Nama Merek</label>
                <select name="brand_name" class="form-control brand" style="width: 100%;">
                @foreach($brands as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                 @endforeach
                </select>
              
				
           		@if($errors->has('brand_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('brand_name') }}
                </label>
                @endif
                
              </div>
              
              
              <div class="form-group {{ $errors->has('class_name') ? 'has-error' : '' }}">
                <label>Nama Kelas</label>
                <select name="class_name" class="form-control class" style="width: 100%">
				@foreach($classes as $class)
					<option value="{{ $class->id }}">{{ $class->name }}</option>
				@endforeach                
                </select>
				
           		@if($errors->has('class_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('class_name') }}
                </label>
                @endif
                
              </div>
              
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nama Mobil</label>
                <input class="form-control" placeholder="Kijang Inova ...." name="car_name" type="text">
				
           		@if($errors->has('car_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('car_name') }}
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
    $(".brand").select2();
    $(".class").select2();
  });
</script>
@stop
@endsection