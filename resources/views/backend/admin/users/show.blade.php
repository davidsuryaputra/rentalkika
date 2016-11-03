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
          
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            {{ Session::get('success') }}
          </div>
          @endif
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Detail {{ $user->full_name }}</h3>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" class="form-control" value="{{ $user->full_name }}" disabled>
				</div>
				
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" class="form-control" value="{{ $user->address }}" disabled>
				</div>
				
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" class="form-control" value="{{ $user->phone }}" disabled>
				</div>
				
				<div class="form-group">
					<label>Permission</label>
					<select name="permissions[]" class="permission form-control" data-placeholder="" style="width: 100%;" multiple="multiple" disabled>
					@foreach($user->permissions as $permission)
					    <option value="{{ $permission->id }}" selected="true">{{ $permission->name }}</option>
					@endforeach
					</select>
				</div>
				
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
              	<a href="{{ route('admin.users.index') }}" class="btn btn-info ">Kembali</a> 
              </div>

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
  <!-- Select2 -->
  <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>

  <script>
  $(function () {
    $(".permission").select2();
  });
</script>
@stop
