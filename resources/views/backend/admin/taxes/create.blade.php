@extends('backend.layouts.adminMenu')

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
            <h3 class="box-title">Tambah Pajak Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('admin.taxes.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nama Pajak</label>
                <input class="form-control" placeholder="PPH" name="name" type="text">
				
           		@if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif
                
              </div>

              <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                <label>Nominal Pajak</label>
                <input class="form-control" name="value" placeholder="10" type="text">
				
				@if($errors->has('value'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('value') }}
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
@endsection