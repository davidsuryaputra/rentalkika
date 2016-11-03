@extends('backend.layouts.customerMenu')

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
      Customer
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
                <h3 class="box-title">Transaksi Sewa</h3>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="transaction_sewa" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Rental</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Sewa Berakhir</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($transactions_sewa as $tr_sewa)
                  <tr>
                    <td>{{ $tr_sewa->partner->user->full_name }}</td>
                    <td>{{ $tr_sewa->rent_start }}</td>
                    <td>{{ $tr_sewa->rent_expired }}</td>
                    <td>{{ $tr_sewa->rent_return }}</td>
                    <td>{{ $tr_sewa->status }}</td>
                    <td>{{ $tr_sewa->total }}</td>
                    <td>
                      <a href="{{ route('customer.transaction_sewa.show', $tr_sewa->id) }}" role="button" class="btn btn-info">Show</a>
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
                <h3 class="box-title">Transaksi Antar Jemput</h3>
                <a class="btn btn-primary" href="{{ route('admin.classes.create')}}" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="transaction_antar_jemput" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($classes as $class)
                  <tr>
                    <td>{{ $class->name }}</td>
                    <td>
                      <a href="{{ route('admin.classes.edit', $class->id) }}" role="button" class="btn btn-info">Edit</a>
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
    $('#transaction_sewa').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    
    $('#transaction_antar_jemput').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    
  });
</script>
@stop
