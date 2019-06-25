@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<div class="content-wrapper">


  <section class="content-header"><h2>Remaining amount Payment</h2></section>
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
      <h3 class="box-title"></h3>
    </div>
<!-- /.box-header -->
    <div class="box-body">  
   
      <form role="form" action="{{ url('makePayment/'.$id) }}" method="post" name="fr"> 
      <div class="col-lg-4">
      {{ csrf_field() }}

<div class="form-group">
        <label>Username</label>

     <input type="text" name="username"  class="form-control" value="{{$user->username}}" readonly="">
       
       
      </div>
          <div class="form-group">
        <label>PaymentDate</label>
        <input type="text" name="OldPaymentDate" class="form-control" readonly="" value="{{date('d-m-Y', strtotime($Payment->paymentdate)) }}">
        <input type="hidden" name="paymentdate" value="{{Carbon\Carbon::today()->format('d-m-Y')}}">
      </div>
        <div class="form-group">
        <label>Actual Amount</label>
        <input type="text" name="ActualAmount" class="form-control" readonly="" value="{{$Payment->actualamount}}">
        
      </div>
         <div class="form-group">
        <label>Paid Amount</label>
        <input type="text" name="PaidAmount" class="form-control" readonly="" value="{{$Payment->actualamount-$Payment->remainingamount}}">
        <input type="hidden" name="Userid" value="{{$user->userid}}">
        
      </div>
   
      <!-- /input-group -->
      </div>
<!-- /.col-lg-6 -->
    <div class="col-lg-4">
    <div class="form-group">
        <label>Package</label>

       <select name="SchemeID" id="package"  class="form-control" readonly=""><option selected value="{{$Scheme->schemeid}}" >
       {{$Scheme->schemename}}</option>
       
        </select>
      </div>
        <!--   <div class="form-group">
        <label>Joining Date</label>
        <input type="text" name="joininigDate" class="form-control" readonly="" value="{{$Payment->PaymentDate}}">
        
      </div> -->
      <div class="form-group">
        <label>Remaining Amount</label>
        <input type="text" name="OldremainingAmount" class="form-control" id="remainingamount" readonly="" value="{{$Payment->remainingamount}}">
      </div>
    </div>
  </div>
  <div class="box-body" style="padding:0px">
    <div class="col-md-2"></div>
  <div class="col-md-8">

      <table>
        
        <thead>

             <tr>       <th></th>
                        <th>Amount</th>
                        <th>Remarks</th>
            </tr>
            </thead> 
             @foreach($PaymentTypes as $PaymentType)
           <tr><td><input type="checkbox"  name="Mode[]" class="check" value="{{$PaymentType->paymenttypeid}}"> &emsp;<label>{{$PaymentType->paymenttype}}</label>&emsp;</td><td><input type="text" class="form-control price number"  disabled="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled=""></td>
        @endforeach</tr>   </table>
      </div>
  <div class="col-lg-10"> 
  <div class="col-lg-5">
    <table>
      <div class="form-group">
        <tr><td>
          <label>Total Amount</label>&emsp;</td>  
             <td><input type="text"  name="Total" class="form-control form-inline" placeholder="Total" id="total"  class="span9" readonly="" /></td></tr>
              <tr><td><label>Remaining amount</label>&emsp;</td>  
             <td><input type="text"  name="rtotal" class="form-control form-inline" placeholder="Remaining amount" id="ramount"  class="span11" readonly="" /></td></tr>  <tr><td><label>Due Date</label></td><td><input type="date" name="duedate"  class="form-control" id="duedate" name="duedate"min="<?php echo date("Y-m-d");?>"> </td></tr></div>
        </table>
  </div>
  <div class="col-lg-5">
    <table>
    <div class="form-group"><tr>
              <td  style="display: none;"><label>Reciept No. </label> &emsp; </td><td  style="display: none;"><input type="text" name="RecieptNo"  id="RecieptNo" class="form-control" value="{{ $Payment->receiptno }}" /></td></tr></div>
    </table>
  </div>
  </div>
   <input type="hidden" name="ok" id="ok" value="">
              <br>
              <br>
<div class="col-lg-8 col-md-offset-4" style="height: 100px;">
  <br>
    <div>
       <button type="button" id="save" value="button" class="btn bg-blue margin" onclick="checkform()" data-toggle="modal" data-target="#myModalpayment">
         Save</button>
 <!--    <button type="submit" class="btn bg-orange btn-block" onclick="checkform()">
    Save</button> -->   
   
       <button type="button" class="btn btn-danger" onclick="window.location='{{ URL::previous() }}'">Cancel</button></div><!-- <a href="window.location='{{ URL::previous() }}'" class="btn btn-danger btn-block">Cancel</a> -->
    <br>
    <div></div>
  

  </div>
    </div>
  </div>
  <div class="modal fade" id="myModalpayment" role="dialog" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close"  data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Print</h4>
        </div>
        <div class="modal-body">
          <p>whould you like to print receipt ?</p>
        </div>
          
        <div class="modal-footer">

         
          <button id="submit" type="submit" class="btn bg-blue margin" style="display: none;"> Save</button>
           <button id="saveprint" type="button" style="margin-top: -1px;"  class="btn bg-blue margin" onclick="abcd()"> Save </button>
          <a href="{{ url('members') }}"  class="btn bg-blue">View Members</a>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
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
  function abcd(){
    $('#submit').trigger('click');
    $('#saveprint').hide();
  }

 // $('#submit').on('click',function(){

 //   if(ok){
 //      $('#ok').val('ok');

 //   }
 //   else{
 //     $('#ok').val('not ok');
   
 //   }
 // });
</script>
<script type="text/javascript">
  
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price').on('change',function(){
  calculate();
 
});
</script>
<script type="text/javascript">
  function calculate(){

   var sum = 0;
     $('.price').each(function() {
        sum += Number($(this).val());
    });
     // alert(sum);
     $('#total').val(sum);
     $('#ramount').val('');

     var sum2 = $('#total').val();
     var FinalAmount = $('#remainingamount').val();
     if(Number(sum2) < Number(FinalAmount)){
      var r = Number(FinalAmount) - Number(sum2);
      if(Number(r)>0){

       $('#ramount').val(Math.round(Number(r)));
      }

      else{
        $('#ramount').val(0);
      }

     }
     else if(Number(sum2) > Number(FinalAmount)){
        alert('Please Enter valid amount');
        $('.price').val('');
        $('#total').val('');
     }
  }
</script>

  <!-- function calculate(){

     var sum2 = $('#total').val();
     sum = 0;
      $('.price').each(function() {
        sum += Number($(this).val());
    });
     $('#total').val(sum);

     var FinalAmount = $('#remainingamount').val();
     // alert(FinalAmount);
     if(Number(sum2) < Number(FinalAmount)){

      var r = Number(FinalAmount) - Number(sum2);
      alert(r);
      if(Number(r)>0){

       $('#remainingamount').val(Number(r));
       $('#ramount').val(Number(r));
      }
      else{
        // $('#remainingamount').val('');
        $('#ramount').val(0);
      }

     }
  }
  
  $('#total').on('change',function(){
      calculate();
  });
  
   
} -->
<script type="text/javascript">
  function checkform() {

    if(document.fr.total.value == "" || document.fr.total.value == "0") {
        alert("please enter right amount");
        $('#save').removeAttr('data-toggle');
        return false;
    }
    // alert($("#remainingamount").val());
    else if($("#ramount").val() > 0){
      if( $('#duedate').val() == ""){
       // $('#duedate').attr("required", "true");

        $('#save').removeAttr('data-toggle');
       alert('Please Enter Due Date');
        // $('#save').removeAttr('data-toggle');
       return false;
      }
      else{
         // $('#save').attr('data-toggle','modal');

          $('#save').attr('data-toggle','modal');
        return true;
        // $('#save').attr('data-toggle','modal');
      }
  }
  else{
    $('#duedate').val('');
     $('#save').attr('data-toggle','modal');
        return true;
  }
}
</script>
<script type="text/javascript">
  $('.check').on('change',function(){
  
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]:first').val();
             $(this).closest('tr').find('[type=text]').prop("disabled", false);
               $(this).closest('tr').find('[type=text]:first').attr('required','');
                if (y == "")
                {
                  // alert("kindly enter values of selected PaymentType !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){

                 $(this).closest('tr').find('[type=text]').attr("disabled", "disabled");
                  $(this).closest('tr').find('[type=text]').val('');
              
            }
                calculate();
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

<!-- <script type="text/javascript">
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
</script> -->
<!-- <script type="text/javascript">
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
// </script> -->

@endsection