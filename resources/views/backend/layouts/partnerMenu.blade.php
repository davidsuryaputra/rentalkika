@extends('backend.layouts.app')

@section('title', 'Partner Dashboard')

@section('name', Auth::user()->full_name)

@section('role', '')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="{{ url('home') }}">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  <li class="treeview">
  	<a href="{{ route('partner.vehicles.index') }}">
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
      <li><a href="{{ route('admin.banks.index') }}"><i class="fa fa-circle-o"></i> Bank</a></li>
      <li><a href="{{ route('admin.taxes.index') }}"><i class="fa fa-circle-o"></i> Pajak</a></li>
    </ul>

  </li>
  -->

</ul>

@endsection