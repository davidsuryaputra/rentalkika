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
	 	
		  <?php if(Session::has('success')): ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            <?php echo e(Session::get('success')); ?>

          </div>
          <?php endif; ?>
          
		 	
		 	<div class="col-lg-5 col-lg-offset-1">
		 	
		 	<form name="register" method="post" action="<?php echo e(url('/register_partner')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


		  <div id="personal">
	          <div class="form-group <?php echo e($errors->has('full_name') ? 'has-error' : ''); ?>">
	            <label>Nama Rental: </label>
	            <input type="text" class="form-control" value="" name="full_name"/>
	            
	            <?php if($errors->has('full_name')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('full_name')); ?>

				</label>	            
	            <?php endif; ?>
	          </div>
	
	          <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
	            <label>Alamat Rental: </label>
	            <input type="text" class="form-control" value="" name="address"/>
	            
	            <?php if($errors->has('address')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('address')); ?>

				</label>	            
	            <?php endif; ?>
	          </div>
	
	          <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
	            <label>Telepon Rental: </label>
	            <input type="text" class="form-control" value="" name="phone"/>
	            
	            <?php if($errors->has('phone')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('phone')); ?>

				</label>	            
	            <?php endif; ?>
	          </div>
	          
	          <div class="form-group <?php echo e($errors->has('kota_pool') ? 'has-error' : ''); ?>">
	          	<label>Lokasi Pool (Kota)</label>
	          	<select name="kota_pool" class="form-control kota_pool" style="width: 100%">
	          		<?php foreach($cities as $city): ?>
	          		<option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
	          		<?php endforeach; ?>
	          	</select>
	          	
	          	<?php if($errors->has('kota_pool')): ?>
	          	<label class="control-label">
	          		<i class="fa fa-times-circle-o"></i>
	          		<?php echo e($errors->first('kota_pool')); ?>

	          	</label>
	          	<?php endif; ?>
	          </div>
	          
	          <div class="form-group <?php echo e($errors->has('alamat_pool')); ?>">
	          	<label>Alamat Pool</label>
	          	<input type="text" name="alamat_pool" class="form-control">
	          	
	          	<?php if($errors->has('alamat_pool')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('alamat_pool')); ?>

				</label>	          	
	          	<?php endif; ?>
	          </div>
	          
	          <div class="form-group <?php echo e($errors->has('layanan_sopir')); ?>">
				<label>Punya Layanan Sopir</label>
				<select name="layanan_sopir" class="form-control">
					<option value="0">Tidak</option>
					<option value="1">Ya</option>
				</select>	        
				
				<?php if($errors->has('layanan_sopir')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('layanan_sopir')); ?>

				</label>  
				<?php endif; ?>
	          </div>
	
	          <div class="form-group <?php echo e($errors->has('ktp_pemilik') ? 'has-error' : ''); ?>">
	            <label>Upload Identitas Pemilik Rental (KTP/SIM):</label>
	            <input type="file" class="form-control" name="ktp_pemilik"/>
	            
	            <?php if($errors->has('ktp_pemilik')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('phone')); ?>				
				</label>	            
	            <?php endif; ?>
	          </div>
	          
	          <div class="form-group <?php echo e($errors->has('nama_pemilik') ? 'has-error' : ''); ?>">
	            <label>Nama Pemilik Rental:</label>
	            <input type="text" class="form-control" name="nama_pemilik"/>
	            
	            <?php if($errors->has('nama_pemilik')): ?>
	            <label class="control-label">
	            	<i class="fa fa-times-circle-o"></i>
	            	<?php echo e($errors->first('nama_pemilik')); ?>

	            </label>
	            <?php endif; ?>
	          </div>
	
	          <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
	            <label>E-mail:</label>
	            <input type="text" class="form-control" value="" name="email"/>
	            
	            <?php if($errors->has('email')): ?>
	            <label class="control-label">
	            	<i class="fa fa-times-circle-o"></i>
	            	<?php echo e($errors->first('email')); ?>

	            </label>
	            <?php endif; ?>
	          </div>
	
	          <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
	            <label>Password:</label>
	            <input type="password" class="form-control" value="" name="password"/>
	
	            <label>Password Confirmation:</label>
	            <input type="password" class="form-control" name="password_confirmation"/>
	            
	            <?php if($errors->has('password')): ?>
				<label class="control-label">
					<i class="fa fa-times-circle-o"></i>
					<?php echo e($errors->first('password')); ?>

				</label>	      
	            <?php endif; ?>
	          </div>
	
          </div>

          <div class="clear"></div>

          <div class="sell_submit_wrapper">
            <!--
            <span class="custom_chb_wrapper fL">
              <span class="custom_chb">
                <input type="checkbox" name=""/>
              </span>
              <label>I agree to the Terms and Conditions</label>
            </span>
          -->
            <input type="submit" value="Submit" class="btn btn-theme"/>
            <div class="clear"></div>
          </div>
          </form>
          
	 	</div><! --/row -->
	 </div><! --/container -->
	 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>