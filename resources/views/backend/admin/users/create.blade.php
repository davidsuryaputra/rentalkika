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
            <form method="post" action="{{ route('admin.users.store') }}">
            {{ csrf_field() }}
            <div class="box">
            
              <div class="box-header">
                <h3 class="box-title">Tambah Admin</h3>
                <div class="box-tools">
                </div>
              </div>
            
              <!-- /.box-header -->
              <div class="box-body">
              
				<div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
					<label>Nama Lengkap</label>
					<input type="text" class="form-control" name="full_name">
					
					@if($errors->has('full_name'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('full_name') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
					<label>Alamat Lengkap</label>
					<input type="text" class="form-control" name="address">
					
					@if($errors->has('address'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('address') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label>Telepon</label>
					<input type="text" class="form-control" name="phone">
					
					@if($errors->has('phone'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('phone') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label>Email</label>
					<input type="text" class="form-control" name="email">
					
					@if($errors->has('email'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('email') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
					
					<label>Password Confirmation</label>
					<input type="password" class="form-control" name="password_confirmation">
					
					@if($errors->has('password'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('password') }}
	                </label>
	                @endif				
				</div>
				
				<div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
					<label>Permissions</label>
					<select name="permissions[]" class="permission form-control" data-placeholder="Tambahkan permission" style="width: 100%;" multiple="multiple">
					@foreach($permissions as $permission)
					@if($permission->name == 'access.backend.admin')
					<option value="{{ $permission->id }}" selected="">{{ $permission->name }}</option>
					@else
					<option value="{{ $permission->id }}">{{ $permission->name }}</option>
					@endif					
					@endforeach
					</select>
					
					@if($errors->has('permissions'))
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                {{ $errors->first('permissions') }}
	                </label>
	                @endif
				</div>
					
              </div>
              <!-- /.box-body -->
			  <div class="box-footer">
				<input type="submit" value="Submit" class="btn btn-info">   				
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
    $(".permission").select2();
  });
</script>
@stop
