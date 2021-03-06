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
                <h3 class="box-title">Semua Merek Mobil</h3>
                <a class="btn btn-primary" href="{{ route('admin.brands.create')}}" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="brands" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($brands as $brand)
                  <tr>
                    <td>{{ $brand->name }}</td>
                    <td>
                      <a href="{{ route('admin.brands.edit', $brand->id) }}" role="button" class="btn btn-info">Edit</a>
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
                <h3 class="box-title">Semua Kelas Mobil</h3>
                <a class="btn btn-primary" href="{{ route('admin.classes.create')}}" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="classes" class="table table-bordered table-striped">
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
            
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Mobil</h3>
                <a class="btn btn-primary" href="{{ route('admin.cars.create')}}" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="cars" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Merek</th>
                    <th>Kelas</th>
                    <th>Nama</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                @foreach($cars as $car)
                  <tr>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->car_class->name }}</td>
                    <td>{{ $car->name }}</td>
                    <td>
                      <a href="{{ route('admin.cars.edit', $car->id) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('admin.cars.destroy', $car->id) }}" role="button" class="btn btn-info">Delete</a>
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
    $('#brands').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    
    $('#classes').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
    
    $('#cars').DataTable({
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
