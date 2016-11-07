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
              
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Mobil</h3>
                <a class="btn btn-primary" href="<?php echo e(route('partner.vehicles.create')); ?>" role="button">Add New</a>
                <div class="box-tools">
                                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">


                <table id="vehicles" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Mobil</th>
                    <th>Kelas Mobil</th>
                    <th>Tahun</th>
                    <th>Plat Nomor</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach($vehicles as $vehicle): ?>
                  <tr>
                    <td><?php echo e($vehicle->car->name); ?></td>
                    <td><?php echo e($vehicle->car->car_class->name); ?></td>
                    <td><?php echo e($vehicle->year); ?></td>
                    <td><?php echo e($vehicle->license_plate); ?></td>
                    <td><?php echo e($vehicle->status); ?></td>
                    <td>
                      <?php if($vehicle->status == 'available'): ?>
                      <a href="<?php echo e(route('partner.vehicles.edit', $vehicle->id)); ?>" role="button" class="btn btn-info">Edit</a>
                      <a href="<?php echo e(route('partner.vehicles.destroy', $vehicle->id)); ?>" role="button" class="btn btn-danger">Delete</a>
					  <?php endif; ?>                      
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
    $('#vehicles').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.partnerMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>