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
                
                <?php foreach($users as $user): ?>
                  <tr>
                    <td><?php echo e($user->full_name); ?></td>
                    <td><?php echo e($user->partner->nama_pemilik); ?></td>
                    <td><?php echo e($user->status->name); ?></td>
                    <td>
                      <?php if($user->status->name == 'pending' or $user->status->name == 'waiting'): ?>
                      <a href="<?php echo e(route('admin.partners.show', $user->id)); ?>" role="button" class="btn btn-info">Detail</a>
                      <a href="<?php echo e(route('admin.partners.terima', $user->id)); ?>" role="button" class="btn btn-info">Terima</a>
                      <a href="<?php echo e(route('admin.partners.tolak', $user->id)); ?>" role="button" class="btn btn-info">Tolak</a>
                      <a href="<?php echo e(route('admin.partners.destroy', $user->id)); ?>" role="button" class="btn btn-danger">Delete</a>
					  <?php else: ?>
					  <a href="<?php echo e(route('admin.partners.show', $user->id)); ?>" role="button" class="btn btn-info">Detail</a>
					  <a href="<?php echo e(route('admin.partners.destroy', $user->id)); ?>" role="button" class="btn btn-danger">Delete</a>                
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>