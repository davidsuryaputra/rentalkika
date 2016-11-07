<?php $__env->startSection('style'); ?>
  @parent
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Single Project.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<!-- *****************************************************************************************************************
	 TITLE & CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mt">
	 	<div class="row">
		 	
					 	
		 	
		 	<div class="col-lg-5 col-lg-offset-1">
			 <form role="form" method="post" action="<?php echo e(route('customer.order_rental.filter')); ?>">
			 <?php echo e(csrf_field()); ?>

			  
			  
			  
			  <div class="form-group lokasi_mobil_sewa <?php echo e($errors->has('lokasi_mobil_sewa') ? 'has-error' : ''); ?>">
			  	<label>Lokasi mobil yang ingin disewa</label>
			  	<select class="form-control lokasi_mobil_sewa" name="lokasi_mobil_sewa">
			  		<?php foreach($cities as $city): ?>
			  		<option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
			  		<?php endforeach; ?>
			  	</select>
			  </div>

			  
			  
			  <div class="form-group <?php echo e($errors->has('tahun_mobil') ? 'has-error' : ''); ?>">
			    <label for="InputSubject1">Pilih Tahun Mobil</label>
			    <select class="form-control tahun" name="tahun_mobil" style="width: 100%;">
			    <?php foreach($vehicles as $vehicle): ?>
					<option value="<?php echo e($vehicle->year); ?>"><?php echo e($vehicle->year); ?></option>
				<?php endforeach; ?>			    
			    </select>
			    
			    <?php if($errors->has('tahun_mobil')): ?>
					<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('tahun_mobil')); ?>

					</label>			    
			    <?php endif; ?>
			  </div>
			  
			  <div class="form-group <?php echo e($errors->has('jenis_mobil')); ?>">
			  	<label for="message1">Pilih Jenis Mobil Sewa</label>
			  	<select class="form-control jenis" name="jenis_mobil" style="width: 100%;">
			  		<?php foreach($car_classes as $car_class): ?>
					<option value="<?php echo e($car_class->id); ?>"><?php echo e($car_class->name); ?></option>			  		
			  		<?php endforeach; ?>
			  	</select>
			  	
			  	<?php if($errors->has('jenis_mobil')): ?>
			  		<label class="control-label">
			  		<i class="fa fa-times-circle-o"></i>
			  		<?php echo e($errors->first('jenis_mobil')); ?>

			  		</label>
			  	<?php endif; ?>
			  </div>
			  <button type="submit" class="btn btn-theme">Filter</button>
			</form>
			</div>
		 	
		 	<!--
		 	<div class="col-lg-4 col-lg-offset-1">
			 	<div class="spacing"></div>
		 		<h4>Project Details</h4>
		 		<div class="hline"></div>
		 		<p><b>Date:</b> April 18, 2014</p>
		 		<p><b>Author:</b> Marcel Newman</p>
		 		<p><b>Categories:</b> Illustration, Web Design, Wordpress</p>
		 		<p><b>Tagged:</b> Flat, UI, Development</p>
		 		<p><b>Client:</b> Wonder Corp.</p>
		 		<p><b>Website:</b> <a href="http://blacktie.co">http://blacktie.co</a></p>
		 	</div>
		 	-->
		 	
	 	</div><! --/row -->
	 </div><! --/container -->
	 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	@parent
	<!-- Select2 -->
	<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>