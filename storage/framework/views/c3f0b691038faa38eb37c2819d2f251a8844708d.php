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
                <h3 class="box-title">Detail partner <?php echo e($user->full_name); ?></h3>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
				
				<div class="form-group">
					<label>KTP Pemilik</label>
					<img src="<?php echo e($ktp_pemilik); ?>" alt="">
				</div>
				
				<div class="form-group">
					<label>Nama Pemilik</label>
					<input type="text" class="form-control" value="<?php echo e($user->partner->nama_pemilik); ?>" disabled>
								
				</div>
				
				<div class="form-group">
					<label>Zona</label>
					<input type="text" class="form-control" value="<?php echo e($user->partner->zone->name); ?>" disabled>
				</div>
				
				<div class="form-group">
					<label>Punya Layanan Sopir</label>
					<?php if($user->partner->layanan_sopir == 0): ?>
					<input type="text" class="form-control" value="Tidak" disabled>
					<?php else: ?>
					<input type="text" class="form-control" value="Ya" disabled>
					<?php endif; ?>
				</div>
				
				<div class="form-group">
					<label>Kota Pool</label>
					<input type="text" class="form-control" value="<?php echo e($user->partner->kota_pool->name); ?>" disabled> 
				</div>
				
				<div class="form-group">
					<label></label>
					<input type="text" class="form-control" value="<?php echo e($user->partner->alamat_pool); ?>" disabled>
				</div>

              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
              	<a href="<?php echo e(route('admin.partners.index')); ?>" class="btn btn-primary">Back</a>
              </div>
           
            </div>
            <!-- /.box -->
            
            
          </div>
        </div>
  </section>

  <!-- /.content -->
  
</div>

  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>