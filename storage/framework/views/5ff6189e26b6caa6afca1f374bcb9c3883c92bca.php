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
            <form method="post" action="<?php echo e(route('admin.pricings.antar_jemput_update', $harga_antar_jemput->id )); ?>">
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
						<?php if($zone->id == $harga_antar_jemput->zone_id): ?>						
						<option value="<?php echo e($zone->id); ?>" selected=""><?php echo e($zone->name); ?></option>
						<?php else: ?>
						<option value="<?php echo e($zone->id); ?>"><?php echo e($zone->name); ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>					
					
					<?php if($errors->has('zone_name')): ?>
	                <label class="control-label">
	                <i class="fa fa-times-circle-o"></i>
	                <?php echo e($errors->first('zone_name')); ?>

	                </label>
	                <?php endif; ?>				
				</div>
				
				<div class="form-group <?php echo e($errors->has('value') ? 'has-error' : ''); ?>">
					<label>Harga</label>
					<input type="text" class="form-control" value="<?php echo e($harga_antar_jemput->value); ?>" name="value">
					
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
				<input type="submit" value="Update" class="btn btn-info">   				
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


<?php echo $__env->make('backend.layouts.adminMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>