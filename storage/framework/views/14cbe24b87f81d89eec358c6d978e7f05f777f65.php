<?php $__env->startSection('style'); ?>
  @parent
  <!-- Select2 -->
  <!--<link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">-->
<!--  
  <link rel="stylesheet" href="<?php echo e(url('plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
  -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/bootstrap-datetimepicker.min.css')); ?>">
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
			
			<div class="panel panel-primary">
				<div class="panel-heading"><h4><?php echo e($vehicle->license_plate); ?></h4></div>
				<div class="panel-body">
				
				<form action="<?php echo e(route('customer.order_rental.cek_harga', $vehicle->id)); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<img src="<?php echo e(url('images/'.$vehicle->photo)); ?>" alt="">
				<div class="form-group">
					<label>Provider rental</label>
					<?php echo e($vehicle->partner->user->full_name); ?>

				</div>
				
				<div class="form-group">
					<label>Lokasi Pool</label>
					<?php echo e($vehicle->partner->alamat_pool); ?>

				</div>
				
				<div class="form-group">
					<label>Lokasi Mobil</label>
					<?php echo e($vehicle->partner->city->name); ?>

				</div>
				
				<div class="form-group <?php echo e($errors->has('tujuan_sewa') ? 'has-error' : ''); ?>">
				    <label for="InputName1">Kemana Tujuan Sewa Anda</label>
				    <select class="form-control tujuan_sewa" name="tujuan_sewa" style="width: 100%">
				    	<option value="">Pilih</option>
				    	<?php foreach($cities as $city): ?>
				    	<option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
				    	<?php endforeach; ?>
				    </select>
				    
				    <?php if($errors->has('tujuan_sewa')): ?>
					<label class="control-label">
					<i class="fa fa-times-circle-o"></i>	
					<?php echo e($errors->first('tujuan_sewa')); ?>			
					</label>			    
				    <?php endif; ?>
			  </div>
			  
			  	<!--
				<div class="form-group">
					<label>Di ambil di pool</label>
					<select name="ambil_pool" class="form-control">
						<option value="">Pilih</option>
						<option value="1">Ya</option>
						<option value="0">Tidak</option>
					</select>
				</div>
				-->
				
				
				<div class="form-group">
					<label>Pakai sopir</label>
					<select name="pakai_sopir" class="form-control">
						<option value="">Pilih</option>
						<option value="1">Ya</option>
						<option value="0">Tidak</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Tanggal & Jam Sewa</label>
					<div class="input-group date" id="tanggal_sewa">
					<input class="form-control" name="tanggal_sewa" id="tanggal_sewa" type="text">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
					<!--
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-clock-o"></i>				
						</div>
						<input type="text" name="tanggal_sewa" class="form-control pull-right" id="tanggal_sewa">
					</div>
					-->
				</div>
				
				<div class="form-group">
					<label>Durasi Sewa (Jam)</label>
					<select class="form-control" name="durasi_sewa">
						<option>Pilih</option>
						<option value="14">14 Jam</option>
						<option value="28">28 Jam</option>
						<option value="42">42 Jam</option>
						<option value="56">56 Jam</option>
						<option value="70">70 Jam</option>
						<option value="84">84 Jam</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Tanggal Pengembalian</label>
					<input class="form-control" name="tanggal_pengembalian" type="text" readonly="">
					<!--						
					<div class="input-group date" id="tanggal_pengembalian">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
					-->
				</div>


				
				<input type="submit" value="Cek Harga" class="btn btn-default">				
				</form>
				
				</div>
			</div>			
					 	
	 	</div><! --/row -->
	 </div><! --/container -->
	 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	@parent
	<!-- Select2 -->
	<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>
	<script src="<?php echo e(url('plugins/moment.min.js')); ?>"></script>
	<!--<script src="<?php echo e(url('plugins/daterangepicker/daterangepicker.js')); ?>"></script>-->
	<script src="<?php echo e(url('plugins/bootstrap-datetimepicker.min.js')); ?>"></script>
	<script src="<?php echo e(url('plugins/id.js')); ?>"></script>
	<script>
	$(function () {
    //Initialize Select2 Elements
    $("#tanggal_pengembalian").datetimepicker({
		locale : 'id',  
		format : 'DD/MM/YYYY HH.mm',  
    });
    
    $("select[name='durasi_sewa']").on('change', function () 
    {
    	if(this.val != ""){
    	var tanggal_sewa = $("input[id='tanggal_sewa']").val();
    	//console.log(tanggal_sewa);
    	var momObj = moment(tanggal_sewa, 'DD/MM/YYYY HH.mm');
    	//console.log(momObj);
    	momObj.add(this.value, 'hours');
		//console.log(momObj.format('DD/MM/YYYY HH.mm'));    	
    	$("input[name='tanggal_pengembalian']").val(momObj.format('DD/MM/YYYY HH.mm'));
    	}
    });
    
    $("#tanggal_sewa").datetimepicker({
    	locale : 'id',
		//language : 'id',	
    	//sideBySide: true,
    	/*
    	timePicker: true,
    	timePicker12Hour: false,
    	timePickerIncrement: 30,
   
    		format: "DD/MM/YYYY HH:mm",
    		locale : {
			"daysOfWeek": ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
    		},
		*/	    		
    	});
    
	});
	</script>
<?php $__env->stopSection(); ?>
	
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>