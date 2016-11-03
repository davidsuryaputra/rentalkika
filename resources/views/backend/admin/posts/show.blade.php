@extends('backend.layouts.adminMenu')

@section('style')
	@parent
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">	
@endsection

@section('content')
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
    
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $post->title }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          
          {!! $post->content !!}  

          </div>
          <!-- /.box-body -->
          
          <div class="box-footer">
               <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
          </div>
        </div>

  </section>

  <!-- /.content -->
  
</div>

  <!-- /.content-wrapper -->
@endsection

@section('script')
	@parent
	<!-- CK Editor -->
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    $(".textarea").wysihtml5();
  });
</script>
@endsection