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
                <h3 class="box-title">Semua Rekening</h3>
                <a class="btn btn-primary" href="{{ route('admin.banks.create')}}" role="button">Add New</a>
                <div class="box-tools">
                                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">


                <table id="banks" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Bank</th>
                    <th>Cabang Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Atas Nama Rekening</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($banks as $bank)
                  <tr>
                    <td>{{ $bank->bank_name }}</td>
                    <td>{{ $bank->bank_branch }}</td>
                    <td>{{ $bank->account_name }}</td>
                    <td>{{ $bank->account_number }}</td>
                    <td>
                      <a href="{{ route('admin.banks.edit', $bank->id) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('admin.banks.destroy', $bank->id) }}" role="button" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
                </table>

              </div>
              <!-- /.box-body -->
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
    $('#banks').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
@stop