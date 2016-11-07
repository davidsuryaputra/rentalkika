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
      Partner
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
            <h3 class="box-title">Tambah Mobil Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="<?php echo e(route('partner.vehicles.store')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <!-- text input -->
              
               <div class="form-group <?php echo e($errors->has('car_name') ? 'has-error' : ''); ?>">
                <label>Nama Mobil</label>
                <select name="car_name" class="form-control car_name" style="width: 100%;">
                <?php foreach($cars as $car): ?>
                  <option value="<?php echo e($car->id); ?>"><?php echo e($car->name); ?></option>
                 <?php endforeach; ?>
                </select>
              
				
           		<?php if($errors->has('car_name')): ?>
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                <?php echo e($errors->first('car_name')); ?>

                </label>
                <?php endif; ?>
                
              </div>
              
              
              <div class="form-group <?php echo e($errors->has('plat_nomor') ? 'has-error' : ''); ?>">
                <label>Plat Nomor</label>
                <input name="plat_nomor" type="text" class="form-control class" style="width: 100%">
				
           		<?php if($errors->has('plat_nomor')): ?>
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                <?php echo e($errors->first('plat_nomor')); ?>

                </label>
                <?php endif; ?>
                
              </div>
              
              <div class="form-group <?php echo e($errors->has('car_year') ? 'has-error' : ''); ?>">
                <label>Tahun</label>
                <input class="form-control" placeholder="2012" name="car_year" type="text">
				
           		<?php if($errors->has('car_year')): ?>
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                <?php echo e($errors->first('car_year')); ?>

                </label>
                <?php endif; ?>
                
              </div>
              
              <div class="form-group <?php echo e($errors->has('foto') ? 'has-error' : ''); ?>">
              	<label>Foto Mobil</label>
              	<input class="form-control" name="foto" type="file">
              	
              	<?php if($errors->has('foto')): ?>
				<label class="control-label">
				<i class="fa fa-times-circle-o">
				<?php echo e($errors->first('foto')); ?>				
				</i>				
				</label>              	
              	<?php endif; ?>
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
  
<?php $__env->startSection('script'); ?>
	@parent
  <!-- Select2 -->
  <script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>

  <script>
  $(function () {
    $(".car_name").select2();
  });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.partnerMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>