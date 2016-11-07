<?php $__env->startSection('title', 'Register Personal'); ?>
<?php $__env->startSection('content'); ?>
<!--BEGIN CONTENT-->
  <div id="content">
    <div class="content">
      <div class="breadcrumbs">
        <a href="#">Home</a>
        <img src="images/marker_2.gif" alt=""/>
        <span>Register</span>
      </div>
      <div class="main_wrapper">
        <div class="sell_box sell_box_5">
          <h2><strong>Customer</strong> details</h2>

          <?php if(Session::has('success')): ?>
            <h4><?php echo e(Session::get('success')); ?></h4>
          <?php endif; ?>
          <?php foreach($errors->all() as $error): ?>
            <h4><p class="error"><?php echo e($error); ?></p></h4>
          <?php endforeach; ?>
          <br/>
          <form name="register" method="post" action="<?php echo e(url('/register')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


		  <div id="personal">
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Nama lengkap: </strong></label>
	            <input type="text" class="txb" value="" name="full_name"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Alamat lengkap: </strong></label>
	            <input type="text" class="txb" value="" name="address"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Telepon: </strong></label>
	            <input type="text" class="txb" value="" name="phone"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Upload Identitas (KTP/SIM):</strong></label>
	            <input type="file" class="txb" name="idcard"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>E-mail: </strong></label>
	            <input type="text" class="txb" value="" name="email"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Password:</strong></label>
	            <input type="password" class="txb" value="" name="password"/>
	          </div>
	
	          <div class="input_wrapper last">
	            <label><span>* </span><strong>Password Confirmation:</strong></label>
	            <input type="password" class="txb" name="password_confirmation"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Nama saudara tidak serumah: </strong></label>
	            <input type="text" class="txb" value="" name="family_name"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Alamat saudara tidak serumah: </strong></label>
	            <input type="text" class="txb" value="" name="family_address"/>
	          </div>
	
	          <div class="input_wrapper">
	            <label><span>* </span><strong>Telepon saudara tidak serumah: </strong></label>
	            <input type="text" class="txb" value="" name="family_phone"/>
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
            <input type="submit" value="Submit" class="sell_submit"/>
            <div class="clear"></div>
          </div>
          </form>
        </div>


      </div>
    </div>
  </div>
<!--EOF CONTENT-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>