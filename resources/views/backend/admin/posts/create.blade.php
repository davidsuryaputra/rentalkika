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
    <form role="form" action="{{ route('admin.posts.store') }}" method="POST">
    		  {{ csrf_field() }}
          <div class="box-header with-border">
            <h3 class="box-title">Buat Post Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

			  
              <!-- text input -->
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label>Judul</label>
                <input class="form-control" placeholder="Judul Post" name="title" type="text">
				
           		@if($errors->has('title'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('title') }}
                </label>
                @endif
                
              </div>
              
              <textarea class="textarea" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

			        
        	
          </div>
          
           <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          <!-- /.box-body -->
          
           </form>
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