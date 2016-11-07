<?php $__env->startSection('style'); ?>
  @parent
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(url('bootstrap/css/ionicons.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
          
          <?php if(Session::has('success')): ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            <?php echo e(Session::get('success')); ?>

          </div>
          <?php endif; ?>
          
          <?php if(Session::has('error')): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Peringatan!</h4>
            <?php echo e(Session::get('error')); ?>

          </div>
          <?php endif; ?>          
          
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Zona</h3>
                <a class="btn btn-primary" href="<?php echo e(route('admin.pricings.zone_create')); ?>" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="zones" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach($zones as $zone): ?>
                  <tr>
                    <td><?php echo e($zone->name); ?></td>
                    <td>
                      <a href="<?php echo e(route('admin.pricings.zone_edit', $zone->id)); ?>" role="button" class="btn btn-info">Edit</a>
                      <a href="<?php echo e(route('admin.pricings.zone_show', $zone->id)); ?>" role="button" class="btn btn-info">Detail</a>
                    </td>
                  </tr>
                 <?php endforeach; ?>
                </tbody>
                </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Harga Sewa</h3>
                <a class="btn btn-primary" href="<?php echo e(route('admin.pricings.sewa_create')); ?>" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="harga_sewa" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Zona</th>
                    <th>Kelas Mobil</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach($sewa_pricings as $sewa_pricing): ?>
                  <tr>
                    <td><?php echo e($sewa_pricing->zone->name); ?></td>
                    <td><?php echo e($sewa_pricing->car_class->name); ?></td>
                    <td><?php echo e($sewa_pricing->value); ?></td>
                    <td><?php echo e($sewa_pricing->description); ?></td>
                    <td>
                      <a href="<?php echo e(route('admin.pricings.sewa_edit', $sewa_pricing->id)); ?>" role="button" class="btn btn-info">Edit</a>
                      <a href="<?php echo e(route('admin.pricings.sewa_destroy', $sewa_pricing->id)); ?>" role="button" class="btn btn-info">Delete</a>
                    </td>
                  </tr>
                 <?php endforeach; ?>
                </tbody>
                </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Harga Antar Jemput</h3>
                <a class="btn btn-primary" href="<?php echo e(route('admin.pricings.antar_jemput_create')); ?>" role="button">Add New</a>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="harga_antar_jemput" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Zona</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach($antar_jemput_pricings as $antar_jemput_pricing): ?>
                  <tr>
                    <td><?php echo e($antar_jemput_pricing->zone->name); ?></td>
                    <td><?php echo e($antar_jemput_pricing->value); ?></td>
                    <td>
                      <a href="<?php echo e(route('admin.pricings.antar_jemput_edit', $antar_jemput_pricing->id)); ?>" role="button" class="btn btn-info">Edit</a>
                      <a href="<?php echo e(route('admin.pricings.antar_jemput_destroy', $antar_jemput_pricing->id)); ?>" role="button" class="btn btn-info">Delete</a>
                    </td>
                  </tr>
                 <?php endforeach; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	@parent
	  <!-- DataTables -->
  <script src="<?php echo e(url('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(url('plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

  <script>
  $(function () {
    $('#zones').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>