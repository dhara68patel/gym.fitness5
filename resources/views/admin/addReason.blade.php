@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Reason</h2></section>
          <!-- general form elements -->
           <section class="content">
          
              @if ($errors->any())
            <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert">×</button> 
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Add Reason</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> <div class="col-lg-4"></div><div class="col-lg-4">
              <form role="form" action="{{ url('addReason') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Reason</label>
                  <input type="text" class="form-control" name="Reason" required placeholder="Enter Reason">
                </div>
               
                  <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn bg-blue btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('reasons') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
      </div>
                <!-- Select multiple-->
        

              </form></div><div class="col-lg-3"></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection