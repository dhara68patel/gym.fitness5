@extends('layouts.adminLayout.admin_design')
@section('content')
 <div class="content-wrapper">
   
     
         <section class="content-header"></section>
          <!-- general form elements -->
           <section class="content">
         
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Edit Company</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('editcompany/'.$company->companyid) }}"  method="post">
                 {{ csrf_field() }}
                <!-- text input -->
               <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" class="form-control" name="companyName" required placeholder="Company Name" value="{{$company->companyname}}">
  
                </div>
                <div class="form-group">
                  <label>Gst No.</label>
                    <input type="text" class="form-control" name="GstNo" minlength="15" maxlength="15" required placeholder="Gst No" value="{{$company->gstno}}">
               
                </div>
                 <div class="form-group">
                  <label>Contact Person</label>
                <input type="text" class="form-control" name="contactPerson" required placeholder="ContactPerson" value="{{$company->contactpersonname}}">
                </div>
                  <div class="form-group">
             <label>Contact No.</label>
             
                <input type="text" name="contactNo"  minlength="10" maxlength="10"
 class="form-control number" placeholder="ContactNo" required=""  class="span11"value="{{$company->contactpersonmobileno}}" /><span class="errmsg"></span>
               </div>
             <!--     <div class="form-group">  
                  <label>Contact No.</label>
                <input type="text" class="form-control" name="contactNo" required placeholder="ContactNo">
                </div> -->
                 <div class="form-group">
                  <label>Address</label>
                 <textarea class="form-control" rows="3"  name="add" placeholder="Address">{{$company->companyaddress}}</textarea>
                </div>

                  <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-orange margin">
         Update</button>
         <a href="{{ url('company') }}"class="btn bg-red margin">Cancel</a>
        </div>
                <!-- Select multiple-->
        

              </form></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection