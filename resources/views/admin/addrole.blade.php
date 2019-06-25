@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Role</h2></section>
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
              <h3 class="box-title">Add Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> <div class="col-lg-4"></div><div class="col-lg-4">
              <form role="form" action="{{ url('addrole') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Role Name</label>
                  <input type="text" class="form-control" name="EmployeeRole" required placeholder="Enter role name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3" required=""  name="description" placeholder="Enter Descrription"></textarea>
                </div>

                      <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn bg-orange btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('roles') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
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