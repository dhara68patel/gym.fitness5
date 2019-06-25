@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<div class="content-wrapper">


  <section class="content-header"><h2>Cash Credit</h2></section>
<!-- general form elements -->
  <section class="content">

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Select Member</h3>
    </div>
<!-- /.box-header -->
    <div class="box-body">  
      <form role="form" action="{{ url('addCashCredit') }}" method="post" > 
      <div class="col-lg-4">
      {{ csrf_field() }}

      <div class="input-group">
        <label>Username</label>

       <select name="selectusername" id="selectusername"   class="form-control"><option selected disabled="">--Please choose an option--</option>@foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->username }}</option>@endforeach
        </select>
      </div>
      <!-- /input-group -->
      </div>
<!-- /.col-lg-6 -->
    <div class="col-lg-4">
      <div class="input-group">
        <label>Mobile No:</label>
        <select name="selectmobileno" id="selectmoblieno" class="form-control ">
          <option selected disabled="">--Please choose an option--</option>@foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->MobileNo }}</option>@endforeach
        </select>
      </div>
<!-- /input-group -->
    </div>
    <br>
   <div class="col-lg-4">
      <div class="form-group">
       <button type="button" id="addCashCredit" class="btn btn-info">Next</button>
      </div>
    </div>

<!-- /.col-lg-6 -->
  </div>
  <div class="box-body" id="cashcredit" style="display: none">
  <div class="col-md-8">
    <br>
    <div class="form-group">
      <label>Date</label>
        <input placeholder="date" type="date" class="span3" name="date" value="{{Carbon\Carbon::today()->format('Y-m-d')}}">
    </div>
   
      <table>
             <div class="form-group">
               
        <thead>
             <tr>       <th></th>
                        <th>Amount</th>
                        <th>Remarks</th>
            </tr>
            </thead> 
             @foreach($PaymentTypes as $PaymentType)
           <tr><td><input type="checkbox"  name="Mode[]" value="{{$PaymentType->id}}"> &emsp;<label>{{$PaymentType->PaymentType}}</label>&emsp;</td><td><input type="text" class="form-control price"  disabled="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled=""></td>
        @endforeach</tr> 
      </div>
    </table>
    <br>
<div class="col-lg-8">
    <div class="col-sm-6">
    <button type="submit" class="btn btn-info btn-block">
    Save</button></div>   <div class="col-sm-6"> <a href="{{ url('roles') }}"class="btn btn-danger btn-block">Cancel</a></div>
    </div>

  </div>
  </div>
  </form>
  <div class="col-lg-3"></div>
</div>
<!-- /.box-body -->
</div>

</section>
<script type="text/javascript">
 $('input[type="checkbox"]').on('change',function(){
   // event.preventDefault();
  // var searchIDs = $('input[type="checkbox"]').map(function(){     return $(this).val();    }).get(); // <----
     // $next = $('input[type="checkbox"]').next('td').find('[type=text]');
     //  $next.attr('required','required');
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]').val();
             $(this).closest('tr').find('[type=text]').prop("disabled", false).attr('required','');
                if (y == "")
                {
                  alert("kindly enter values of selected PaymentType !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){
              
            }
        });
          //alert(x);
       if (x == false)
         return false;
       else
        return true;
  });
</script>
<script type="text/javascript">
   $('#addCashCredit').on('click',function(){
  
     var username = document.getElementById("selectusername").value;
     var MobileNo = document.getElementById("selectmoblieno").value;
var _token = $('input[name="_token"]').val();
       $.ajax({
      url:"{{ route('PackageController.getuser') }}",
      method:"POST",
      data:{username:username, MobileNo:MobileNo, _token:_token},
      success:function(result)
      {

       if(result!=null)
       {
      
        var data=result;
        // $('#CashCredit').val(data);
         $('#cashcredit').css('display','block');
       
       }
       else
       {
         $('#cashcredit').css('display','block');
       }
      },
       dataType:"json"
     })

   });
</script>
<script type="text/javascript">
   $('#selectusername').on('change',function(){
    var username = $('#selectusername').val();
    var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('PackageController.getusername') }}",
      method:"POST",
      data:{username:username, _token:_token},
      success:function(result)
      {
      var data=result;
      $('#selectmoblieno').val(data.id);
      },
       dataType:"json"
     });
   });
</script>
<script type="text/javascript">
   $('#selectmoblieno').on('change',function(){
    var user = $('#selectmoblieno').val();
    var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('PackageController.getusername') }}",
      method:"POST",
      data:{username:user, _token:_token},
      success:function(result)
      {
      var data=result;

      // $('#username').attr("value",data.username).val(data.username);
     $("#selectusername").val(data.id);
      },
       dataType:"json"
     });
   });
// </script>

@endsection