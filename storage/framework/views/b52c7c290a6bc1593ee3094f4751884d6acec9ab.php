<?php $__env->startSection('title', 'Partner Dashboard'); ?>

<?php $__env->startSection('name', Auth::user()->full_name); ?>

<?php $__env->startSection('role', ''); ?>

<?php $__env->startSection('sidebar-menu'); ?>
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="<?php echo e(url('home')); ?>">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  <li class="treeview">
  	<a href="<?php echo e(route('partner.vehicles.index')); ?>">
		<i class="fa fa-home"></i> <span>Upload Mobil</span> 	
  	</a>
  </li>
  
  <li class="treeview">
  	<a href="#">
		<i class="fa fa-home"></i> <span>Transaksi</span>  	
  	</a>
  </li>		



  <!--
  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Konfigurasi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="<?php echo e(route('admin.banks.index')); ?>"><i class="fa fa-circle-o"></i> Bank</a></li>
      <li><a href="<?php echo e(route('admin.taxes.index')); ?>"><i class="fa fa-circle-o"></i> Pajak</a></li>
    </ul>

  </li>
  -->

</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>