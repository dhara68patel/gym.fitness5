@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Terms</h2> </section>
          <!-- general form elements -->
           <section class="content ">
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
              <h3 class="box-title">Terms</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('addterms') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Terms</label>
                  <input type="text" class="form-control" name="Terms" required placeholder="Enter Terms">
                </div>
                <div class="form-group">
                  <label>Credit into Minute</label>
                  <input type="text"  class="form-control number"  name="Minutes" placeholder="Enter Credit into Minute" required>
                <!--  <textarea class="form-control" rows="3"  name="Minuts" required placeholder="Enter Minuts"></textarea> -->
                </div>
                <div class="form-group">
                <label>Appointment is required ?</label>
                 <select name="Appointment" class="form-control">
                   <option value="0"selceted>No</option>
                   <option value="1">Yes</option>
                  
                 </select>
               </div>

                         <div class="form-group">   <div class="col-sm-offset-3">
   <div class="col-sm-8">
      <button name="submit" type="submit" class="btn bg-blue margin">Save</button>   <a href="{{ url('terms') }}"class="btn btn-danger">Cancel</a></div></div>
  
  </div>
                <!-- Select multiple-->
        

              </form></div><div class="col-lg-3"></div></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection