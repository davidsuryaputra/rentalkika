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
                <h3 class="box-title">Semua Partner</h3>
                <div class="box-tools">
              </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="partners" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Rental</th>
                    <th>Nama Pemilik</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->partner->nama_pemilik }}</td>
                    <td>{{ $user->status->name }}</td>
                    <td>
                      @if($user->status->name == 'pending' or $user->status->name == 'waiting')
                      <a href="{{ route('admin.partners.show', $user->id) }}" role="button" class="btn btn-info">Detail</a>
                      <a href="{{ route('admin.partners.terima', $user->id) }}" role="button" class="btn btn-info">Terima</a>
                      <a href="{{ route('admin.partners.tolak', $user->id) }}" role="button" class="btn btn-info">Tolak</a>
                      <a href="{{ route('admin.partners.destroy', $user->id) }}" role="button" class="btn btn-danger">Delete</a>
					  @else
					  <a href="{{ route('admin.partners.show', $user->id) }}" role="button" class="btn btn-info">Detail</a>
					  <a href="{{ route('admin.partners.destroy', $user->id) }}" role="button" class="btn btn-danger">Delete</a>                
                      @endif
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
    $('#partners').DataTable({
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
