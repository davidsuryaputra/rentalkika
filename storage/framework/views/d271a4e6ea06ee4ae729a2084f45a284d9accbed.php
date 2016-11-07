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
            <form method="post" action="<?php echo e(route('admin.pricings.sewa_store')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="box">
            <!--
              <div class="box-header">
                <h3 class="box-title">Tentukan Kota</h3>
                <div class="box-tools">
                </div>
              </div>
              -->
              <!-- /.box-header -->
              <div class="box-body">
              
				<div class="form-group <?php echo e($errors->has('zone_name') ? 'has-error' : ''); ?>">
					<label>Zona</label>
					<select name="zone_name" class="form-control zone" style="width: 100%">
						<?php foreach($zones as $zone): ?>						
						<option value="<?php echo e($zone->id); ?>"><?php echo e($zone->name); ?></option>
						<?php endforeach; ?>
					</select>					
					
					<?php if($errors->has('zone_name')): ?>
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                <?php echo e($errors->first('zone_name')); ?>

	                </label>
	                <?php endif; ?>				
				</div>
				
				<div class="form-group <?php echo e($errors->has('car_class') ? 'has-error' : ''); ?>">
					<label>Kelas Mobil</label>
					<select name="car_class" class="car_class form-control" style="width: 100%;">
					<?php foreach($car_classes as $car_class): ?>
					<option value="<?php echo e($car_class->id); ?>"><?php echo e($car_class->name); ?></option>
					<?php endforeach; ?>
					</select>
					
					<?php if($errors->has('car_class')): ?>
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                <?php echo e($errors->first('car_class')); ?>

	                </label>
	                <?php endif; ?>
				</div>
				
				<div class="form-group <?php echo e($errors->has('keterangan') ? 'has-error' : ''); ?>">
					<label>Keterangan</label>
					<select name="keterangan" class="keterangan form-control" style="width: 100%;">
					<option value="sopir">Tarif sopir per jam</option>
					<option value="luar kota">Tarif luar kota per jam</option>
					<option value="overtime">Tarif overtime per jam</option>
					<option value="dasar">Tarif dasar per 14 jam</option>
					</select>
				</div>				
				
				<div class="form-group <?php echo e($errors->has('value') ? 'has-error' : ''); ?>">
					<label>Harga</label>
					<input type="text" class="form-control" name="value">
					
					<?php if($errors->has('value')): ?>
					<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('value')); ?>

					</label>
					<?php endif; ?>
				</div>
					
              </div>
              <!-- /.box-body -->
			  <div class="box-footer">
				<input type="submit" value="Submit" class="btn btn-info">   				
			  </div>
             </div>
             </form>
            <!-- /.box -->
            

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
    $(".zone").select2();
    $(".car_class").select2();
    $(".keterangan").select2();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>