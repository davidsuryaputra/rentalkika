<?php $__env->startSection('style'); ?>
  @parent
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('dist/css/AdminLTE.min.css')); ?>">
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
                <h3 class="box-title">Kota di Zona <?php echo e($zone->name); ?></h3>
                <div class="box-tools">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

				<div class="form-group">
					<select name="cities" class="form-control cities" multiple="multiple" style="width: 100%" disabled>
						<?php foreach($zone->cities as $zone_city): ?>
						<option value="<?php echo e($zone_city->id); ?>" selected><?php echo e($zone_city->name); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group">
					<a href="<?php echo e(route('admin.pricings.zone_index')); ?>" class="btn btn-default">Kembali</a>
				</div>				

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
 <!-- Select2 -->
  <script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>

  <script>
  $(function () {
    $(".cities").select2();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>