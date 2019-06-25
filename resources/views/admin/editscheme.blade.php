@extends('layouts.adminLayout.admin_design')
@section('content')
 <div class="content-wrapper">
   
     
         <section class="content-header"></section>
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
              <h3 class="box-title">Edit Scheme</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('editscheme/'.$scheme->schemeid) }}"  method="post">
                 {{ csrf_field() }}

                <!-- text input -->
                  <div class="form-group">
             <label>Select Root Scheme</label>

             
               <select name="RootSchemeId" required="" class="form-control"class="span11" required><option  disabled=""selected>--Please choose an option--</option>
               @foreach($rootscheme as $rscheme)   
              <option value="{{ $rscheme->rootschemeid }}" {{ ( $rscheme->rootschemeid == $scheme->rootschemeid  ) ? 'selected' : '' }}>{{ $rscheme->rootschemename }}</option>
              @endforeach
          </select>
              </div>
                <div class="form-group">
                  <label>Scheme Name</label>
                  <input type="text" class="form-control" name="SchemeName" value="{{$scheme->schemename}}" placeholder="Enter Scheme Name"required>
                </div>
                <div class="form-group">
                  <label>Number of Days</label>
              
                 <input type="number" class="form-control"  min='0'  value="{{$scheme->numberofdays}}" name="NumberOfDays" placeholder="Enter numer of days" required>
                </div>
                <div class="form-group">
                  <label>Base Price</label>
                  <input type="text" class="form-control" name="BasePrice"value="{{$scheme->baseprice}}" placeholder="Enter Base Price" readonly="">
                </div>
                <div class="form-group">
                  <label>Tax</label>
                  <input type="text" class="form-control"  name="Tax"value="{{$scheme->tax}}" placeholder="Enter Tax" readonly>
                </div>
                <div class="form-group">
                  <label>Actual Price</label>
                  <input type="text" class="form-control" name="ActualPrice"value="{{$scheme->actualprice}}" placeholder="Enter Actual Price" readonly="">
                </div>
                  <div class="form-group">
                  <label>Validity</label>
                  <input type="date" class="form-control" name="validity"value="{{$scheme->validity}}" >
                </div>
                 <div class="form-group">
              <label>From</label>
               <input type="time"class="form-control" name="WorkingHourFrom"
                min="06:00:00" max="12:00" value="<?php $date = date("H:i", strtotime($scheme->workinghourfrom)); echo "$date"; ?>"/></div>
               
               <div class="form-group">To
               <input type="time" class="form-control" name="WorkingHourTo"
                min="06:00" max="23:59"value="<?php $date = date("H:i", strtotime($scheme->workinghourto)); echo "$date"; ?>"  /></div>
               
            
                 <div class="form-group">
                  <label>Status</label>
                  <select  class="form-control"name="status" required>
                      <option selected disabled="">--Please choose an option--</option>
                      <option value="1" {{$scheme->status == '1' ? 'selected':''}}>Active</option>
                      <option value="0" {{$scheme->status == '0' ? 'selected':''}}>Inactive</option>
                  </select>
               
                </div>
                <div class="form-group">
                  <label>Gender</label>
        
                     <input type="checkbox" name="Female"  value="1" {{$scheme->female=='1' ? 'checked' : ''}} >
                      Female
                   
                      <input type="checkbox" name="Male"  value="1"  {{$scheme->male=='1' ? 'checked' : ''}}  >
                      Male
                    
                  </div>

                <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-orange margin">
         Update</button>
         <a href="{{ url('schemes') }}"class="btn bg-red margin">Cancel</a>
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