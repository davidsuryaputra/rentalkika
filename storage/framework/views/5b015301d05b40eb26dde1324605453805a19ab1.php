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
	 		<?php foreach($vehicles as $vehicle): ?>
	 		<div class="col-md-3">
	 		<div class="thumbnail">
	 			<img src="<?php echo e(url('images/'.$vehicle->photo)); ?>" width="320" height="240">
	 			<div class="caption">
	 				<p>
	 				<?php echo e($vehicle->car->brand->name.' '.$vehicle->car->car_class->name.' '.$vehicle->car->name); ?></br>
		 			<?php echo e($vehicle->year); ?></br>
		 			<?php echo e($vehicle->license_plate); ?></br>
		 			<?php echo e($vehicle->partner->user->full_name); ?></br>
	 				</p>
	 			<p>
	 			<a href="<?php echo e(route('customer.order_rental.detail', $vehicle->id)); ?>" class="btn btn-default">Detail</a>
	 			</p>
	 			</div>
	 			
	 		</div>
	 			
	 				 		
	 		</div>
	 		<?php endforeach; ?>
	 	</div><! --/row -->
	 </div><! --/container -->
	 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>