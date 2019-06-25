@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Company</h2></section>
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
              <h3 class="box-title">Add Company</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> <div class="col-lg-4"></div><div class="col-lg-4">
              <form role="form" action="{{ url('addCompany') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" class="form-control" name="companyName" required placeholder="Company Name">
  
                </div>
                <div class="form-group">
                  <label>Gst No.</label>
                    <input type="text" class="form-control" name="GstNo" minlength="15" maxlength="15" required placeholder="Gst No">
               
                </div>
                 <div class="form-group">
                  <label>Contact Person</label>
                <input type="text" class="form-control" name="contactPerson" required placeholder="ContactPerson">
                </div>
                  <div class="form-group">
             <label>Contact No.</label>
             
                <input type="text" name="contactNo"  minlength="10" maxlength="10"
 class="form-control number" placeholder="ContactNo" required=""  class="span11" /><span class="errmsg"></span>
               </div>
             <!--     <div class="form-group">  
                  <label>Contact No.</label>
                <input type="text" class="form-control" name="contactNo" required placeholder="ContactNo">
                </div> -->
                 <div class="form-group">
                  <label>Address</label>
                 <textarea class="form-control" rows="3"  name="add" placeholder="Address"></textarea>
                </div>

                      <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn bg-orange btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('company') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
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