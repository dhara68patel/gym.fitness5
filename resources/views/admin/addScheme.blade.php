@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Scheme</h2></section>
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
              <h3 class="box-title">Add Scheme</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('addscheme') }}" method="post" onsubmit="return myfun()">
                 {{ csrf_field() }}
                <!-- text input -->
               <div class="form-group">
             <label>Select Root Scheme</label>
             
                <select name="RootSchemeId" required class="form-control"class="span11"><option disabled="" selected="">--Please choose an option--</option>@foreach($scheme as $scheme)
              <option value="{{ $scheme->rootschemeid }}">{{ $scheme->rootschemename }}</option>@endforeach
          </select>
              </div>
                <div class="form-group">
                  <label>Scheme Name</label>
                  <input type="text" class="form-control" name="SchemeName" id="SchemeName" required placeholder="Enter Scheme Name"><span id="error_SchemeName"></span>
                </div>
                <div class="form-group">
                  <label>Number of Days</label>
              
                 <input type="number" class="form-control number"  min='0' name="NumberOfDays" required placeholder="Enter numer of days">
                </div>
                <div class="form-group">
                  <label>Base Price</label>
                  <input type="text" class="form-control number" name="BasePrice" id="BasePrice" required placeholder="Base Price">
                </div>
                <div class="form-group">
                  <label>Tax</label>

                  <input type="text" class="form-control" name="Tax" id="Tax"   value="{{($sgst)+($cgst)}}" readonly>
                </div>
                <div class="form-group">
                  <label>Actual Price</label>
                  <input type="text" class="form-control number" name="ActualPrice" id="ActualPrice" required placeholder="ActualPrice">
                </div>
                 <div class="form-group">
                  <label>Validity</label>
                  <input type="date" class="form-control" name="validity"  required placeholder="ActualPrice" min="<?php echo date("Y-m-d");?>">
                </div>
                 <div class="form-group">
              <label>From</label>
               <input type="time" name="WorkingHourFrom"class="form-control" id="from" min="06:00" max="23:59" step="600" required> 
              <!--  <input type="time"class="form-control"  id="from" required name="WorkingHourFrom"
                min="5:00" max="12:00" value="06:00" /> --></div>
      
               <div class="form-group">To
                <input type="time"  name="WorkingHourTo" class="form-control" id="to" min="06:00:00"  required > 
              <!--  <input type="time" class="form-control" id="to" name="WorkingHourTo"
                min="9:00" max="12:00" value="12:00"/> --></div>
               
      <!--       
                 <div class="form-group">
                  <label>Status</label>
                  <select  class="form-control"name="status">
                      <option selected disabled="">--Please choose an option--</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                  </select>
               
                </div> -->
                <div class="form-group">
                  <label>Gender</label>
                     <input type="checkbox" name="Female"  value="1" checked="">
                      Female
                   
                      <input type="checkbox" name="Male"  value="1"  checked="">
                      Male
                    
                  </div>

                   <div class="form-group">
                      <div class="col-sm-offset-3">
              <div class="col-sm-8">
                <button name="submit" type="submit" class="btn bg-blue margin" >
                 Save</button>   <a href="{{ url('schemes') }}"class="btn btn-danger">Cancel</a></div></div>
  
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
<script type="text/javascript">
   $('#BasePrice').on('keyup',function(){
    if($("#BasePrice").val() == 0){
       $('#ActualPrice').val('0');
    }else{
     var result = parseFloat((parseInt($("#BasePrice").val()) / 100) * parseInt($("#Tax").val()));
     var sum=parseFloat(0);
      sum=parseFloat((parseInt($("#BasePrice").val()))+result);
            $('#ActualPrice').val(Math.round(sum) || ''); //shows value in "#rate"
  }

   });
   $('#ActualPrice').on('keyup',function(){
     if($("#ActualPrice").val() == 0){
     
       $('#BasePrice').val('0');
    }
    else
    {

     var result = parseFloat((parseInt($("#Tax").val()))+100);
    
      var ActualPrice = parseFloat($("#ActualPrice").val()*100);
    
      var sum =parseFloat(ActualPrice/result);
     // var sum = parseFloat(0);
     //  sum = parseFloat((parseInt($("#ActualPrice").val()))-result);
     //        $('#BasePrice').val(sum || ''); //shows value in "#rate"
   $('#BasePrice').val(Math.round(sum) || ''); 
   }
   });
</script>
<script type="text/javascript">
    $('#SchemeName').on('keyup',function(){
      // alert("hi");
    var error_SchemeName = '';
    var SchemeName = $('#SchemeName').val();
    var _token = $('input[name="_token"]').val();

     $.ajax({
      url:"{{ route('SchemeController.check') }}",
      method:"POST",
      data:{SchemeName:SchemeName, _token:_token},
      success:function(result)
      {
       if(result == 'unique')
       {
        $('#error_SchemeName').html('<label class="text-success">Scheme is Valid</label>');
        $('#SchemeName').removeClass('has-error');
        $('#firstbtn').attr('disabled', false);
       }
       else
       {
        // alert("hi1");
        $('#error_SchemeName').html('<label class="text-danger">Scheme is Already Exist</label>');
        $('#SchemeName').addClass('has-error');
        $('#firstbtn').attr('disabled', 'disabled');
       }
      }
     })

 });
</script>
<script type="text/javascript">
  function myfun(){
    // alert('sad');
    // return false;
     var from= $('#from').val();
  var to=$('#to').val();
  if(from==to){
    alert('Please enter valid time!')
    return false;
  }
  else{
    return true;
  }
  }
 
</script>

@endsection