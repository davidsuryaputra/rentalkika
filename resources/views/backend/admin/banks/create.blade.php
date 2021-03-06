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
            <h3 class="box-title">Tambah Rekening Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('admin.banks.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                <label>Nama Bank</label>
                <input class="form-control" placeholder="BCA" name="bank_name" type="text">
				
           		@if($errors->has('bank_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('bank_name') }}
                </label>
                @endif
                
              </div>

              <div class="form-group {{ $errors->has('bank_branch') ? 'has-error' : '' }}">
                <label>Cabang Bank</label>
                <input class="form-control" name="bank_branch" placeholder="Cabang Mulyorejo" type="text">
				
				@if($errors->has('bank_branch'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('bank_branch') }}
                </label>
                @endif
                
              </div>
              
              <div class="form-group {{ $errors->has('account_name') ? 'has-error' : '' }}">
                <label>Rekening atas nama</label>
                <input class="form-control" name="account_name" placeholder="PT. ABC" type="text">
				
				@if($errors->has('account_name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('account_name') }}
                </label>
                @endif
                
              </div>
              
              <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                <label>No Rekening</label>
                <input class="form-control" name="account_number" placeholder="50506020" type="text">
				
				@if($errors->has('account_number'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('account_number') }}
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