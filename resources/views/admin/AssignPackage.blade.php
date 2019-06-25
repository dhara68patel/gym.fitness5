@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Assign Package</h2></section>
          <!-- general form elements -->
           <div class="content">
          @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
             @if ($message = Session::get('message'))
   
    @if($message=="User Is Already Exits")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
@endif 
 <form action="{{ url('assignPackage') }}" method="post" enctype="multipart/form-data" name="frmMr" >  {{ csrf_field() }}
<div class="box box-primary" id="secondstep">

           <div class="box-header with-border">
              <h3 class="box-title">Add Member</h3>
            </div>
            <div class="box-body">
               <div class="col-lg-10"><h4><u>User Details</u></h4> 
                <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                    <label>Username</label>
                           <select name="selectusername" id="selectusername" readonly class="form-control" ><option selected disabled="">--Please choose an option--</option>
                                <option selected="" value=" {{$usermember->userid}}">{{$usermember->username}}</option></select>
                         <!--  <select name="selectusername" id="selectusername"   disabled="true" class="form-control"><option selected disabled="">--Please choose an option--</option>@foreach($users as $user)
              <option value="{{ $usermember->id }}">{{ $user->username }}</option>@endforeach
          </select> -->
                       
                    
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                 <div class="col-lg-6">
                  <div class="input-group">
                        <label>Mobile No:</label>
                              <select name="selectmobileno" id="selectmoblieno"  disabled="true" class="form-control" ><option selected disabled="">--Please choose an option--</option>
                                <option selected="" value="{{$usermember->mobileno}}">{{$usermember->mobileno}}</option><!-- @foreach($users as $user)
              <option value="{{ $user->MobileNo }}">{{ $user->MobileNo }}</option>@endforeach -->
          </select>
                   
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>
           
               </div>
               <div class="col-lg-12">
                     <hr style="border-width: 2px;border-color: black"> <h4><u>Assign Package</u></h4> 
               <div class="col-lg-5">
              
              <div class="form-group">
             <label>Select Root Scheme</label>
             
                <select name="RootSchemeId" id="rootscheme" class="form-control"class="span11"><option selected value="">--Please choose an option--</option>@foreach($RootScheme as $rscheme)
              <option value="{{ $rscheme->rootschemeid }}">{{ $rscheme->rootschemename }}</option>@endforeach
          </select>
              </div>
              <div class="form-group">
             <label>Select Package</label>
            
                <select name="SchemeID" id="scheme" class="form-control"class="span11"><option selected value="">--Please choose an option--</option>
          </select>
              </div>
             
             <div class="form-group">
             <label>Membership Amount</label>
             <input type="text" name="MembershipAmount" id="MembershipAmount" class="form-control" placeholder="Membership Amount"   class="span11" />
               
              </div>
              <div class="form-group">
             <label>Base Amount</label>
             <input type="text" name="BaseAmount" id="BasePrice" class="form-control" placeholder="Base Amount"   class="span11" disabled="" />
               
              </div>
              <div class="form-group">
             <label>Final Amount</label>
             <input type="text" name="ActualAmount" id="FinalAmount"class="form-control" placeholder="Final Amount"   class="span11"  readonly="" />
               
              </div>
         </div>

          <div class="col-md-5">
                

             <div class="form-group">
             <label>Join Date</label>
             
                <input placeholder="Joining date"   onchange="assigndate()" type="date" value="<?php echo date('Y-m-d');?>" id="startingdate" class="form-control" name="Join_date" class="span11">
            
            </div>
               <div class="form-group">
             <label>Finish Date</label>
             
                <input placeholder="Finishing date" id="finishdate" class="form-control" name="Expire_date" class="span11">
            
            </div>
               <div class="form-group">
             <label>Discount (%)</label>
             
               <input type="text" name="Discount" id="Discount1" class="form-control number" placeholder="Discount (in %)"  value="0" class="span11" />
            
            </div>
             <div class="form-group">
             <label>Discount (Rs.)</label>
             
               <input type="text" name="Discount" id="Discount2" class="form-control number" placeholder="Discount(in Rs.)"  value="0" class="span11" />
            
            </div>
              <!--   <div class="form-group">
             <label>Discount 2</label>
             
               <input type="text" name="Discount2" id="Discount2"  class="form-control" placeholder="Discount2" value="0"  class="span11" disabled="" />
            
            </div> -->
            <div class="form-group">
             <label>Total Discount</label>
             
               <input type="text" name="TotalDiscount" id="totaldiscount" class="form-control" placeholder="TotalDiscount"   class="span11" readonly="" />
                 <input type="hidden" name="PaymentDate"  value="{{Carbon\Carbon::today()->format('Y-m-d')}}" />
            
            </div>
              
         </div>

       </div>
       <div class="col-lg-8">
        <table>
<!--       <div class="form-group">
       
            
             <tr><td>
                    <input type="checkbox" id="disabled" value="21"> <label>Cash Credit </label> &emsp;</td>
             <td> <input type="text" name="CashCredit" id="CashCreditAmount" class="form-control" placeholder="CashCredit"   class="span9" disabled="" /></td>&emsp;
              <td> <input type="text" name="CashCreditcheck" class="form-control" placeholder="CashCreditcheck"   class="span9"disabled=""  /></td></tr>
            
            </div> -->
          </table>
            <br>
            <table>
             <div class="form-group">
               
        <thead>
             <tr>       <th></th>
                        <th>Amount</th>
                        <th>Remarks</th>
            </tr>
            </thead> 
             @foreach($PaymentTypes as $PaymentType)
           <tr><td><input type="checkbox" class="check" name="Mode[]" value="{{$PaymentType->paymenttypeid}}"> &emsp;<label>{{$PaymentType->paymenttype}}</label>&emsp;</td><td><input type="text" class="form-control price"  disabled="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled=""></td>
        @endforeach</tr> <!--
          <tr><td><input type="checkbox" name="terms[]" value=""><label>Cash</label></td><td><input type="text"class="form-control" name="value[]"></td>
            <td><input type="text"class="form-control" name="value[]"></td>
       </tr>
          <tr><td><input type="checkbox" name="terms[]" value=""><label>Cheque</label></td><td><input type="text" class="form-control" name="value[]"></td>
            <td><input type="text"class="form-control" name="value[]"></td>
       </tr>
        <tr><td><input type="checkbox" name="terms[]" value=""><label>Cheque</label></td><td><input type="text"  class="form-control"name="value[]"></td>
          <td><input type="text"class="form-control" name="value[]"></td>
       </tr> -->
       

                </div>
             </table>
                 
             <div class="col-lg-7">
         <table>
               <div class="form-group">

                    <tr><td>
                     <label>Total Amount</label>&emsp;</td>  
             <td><input type="text"  name="Total" class="form-control form-inline" placeholder="Total" id="total"  class="span9" readonly="" /></td></tr>
             <td>
                     <label>Remaining amount</label>&emsp;</td>  
             <td><input type="text"  name="rtotal" class="form-control form-inline" placeholder="Remaining Amount" id="remainingamount"   class="span11" readonly="" /></td></tr>       
              <tr><td><label>Due Date</label></td><td><input type="date" name="duedate"  class="form-control" id="duedate" name="duedate"min="<?php echo date("Y-m-d");?>"> </td></tr>
          </div></table></div>
   <input type="hidden" name="ok" id="ok" value="">
             <div class="col-lg-5"><table>  <div class="form-group"><tr>
              <td><!-- <label>Reciept No. </label> --> &emsp; </td><td><input type="hidden" name="RecieptNo" class="form-control" placeholder="RecieptNo"   class="span9" value="{{$receiptNo}}"  readonly="" /></td></tr></div></table>
              </div>
              <div class="col-lg-8">
          <div class="form-group">
         <div class="col-sm-offset-6">
       <p class="btn bg-blue margin" data-toggle="modal" data-target="#myModal" id="save" onclick="return checkform()">Save</p>

         <a href="{{ url('members') }}"class="btn bg-red margin">Cancel</a>

        </div></div></div></div>

           </div>
        </div>
            
            <!-- /.box-body -->
        
  </div>
  </div>
 <div class="modal fade" id="myModal" role="dialog" style="display: none;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close"  data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Print</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want to pay ?</p>
        </div>
          
        <div class="modal-footer">
           <button id="submit" type="submit" class="btn bg-blue margin" style="display: none;"> Save </button>
           <button id="saveprint" type="button"style="margin-top: -1px;"  class="btn bg-blue margin" onclick="abcd()">Save </button>
          <!-- <button id="submit" type="submit" class="btn bg-blue">Save & Print</button> -->
            <a href="{{ url('members') }}"  class="btn bg-blue">View Members</a>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div> 
   </form>  
</section>
<script type="text/javascript">
  function abcd(){
    $('#submit').trigger('click');
    $('#saveprint').hide();

  }

 $('#submit').on('click',function(){
   // var ok = confirm('Are you want message?');
   // if(ok){
   //    $('#ok').val('ok');
     
   // }
   // else{
   //   $('#ok').val('not ok');

   // }
 });
</script>
<script type="text/javascript">
    function checkform() {

   if(Number(document.frmMr.ActualAmount.value) > 0 ){

    if(Number(document.frmMr.total.value) > Number(document.frmMr.ActualAmount.value)) {
     
        alert("please enter right amount abc");
        $('#save').removeAttr('data-toggle');
        return false;

    }
    else if(Number(document.frmMr.total.value) == "" || Number(document.frmMr.total.value) == 0 ) {
     

        alert("please enter right amount");

        $('#save').removeAttr('data-toggle');
        return false;

    }
   
  }
  
    else if(document.frmMr.rootscheme.value == "")
    {
       alert("please select RootScheme");
         $('#save').removeAttr('data-toggle');
        return false;
      
    }
    else if(document.frmMr.scheme.value == "")
    {
      $('#FinalAmount').val('');
         $('#MembershipAmount').val('');
         $('#Discount2').val('');
          $('#Discount1').val('');
           $('.price').val('');
        $('#total').val('');
        $('#remainingamount').val('');
        
       alert("please select scheme ");
       $('#save').removeAttr('data-toggle');
        return false;


        
    }
     if($("#remainingamount").val() != 0 && $("#remainingamount").val() > 0){
    if( $('#duedate').val() == ""){
       // $('#duedate').attr("required", "true");
       alert('Please Enter Due Date');
        $('#save').removeAttr('data-toggle');
       return false;
      }
      else{
         $('#save').attr('data-toggle','modal');
        return true;
        // $('#save').attr('data-toggle','modal');
      }

    }
    if(Number($("#FinalAmount").val()) < 0 ){
      alert('Please enter right amount');
     
       $('#save').removeAttr('data-toggle');
       return false;
    }
    else
    {
    // alert('allok');
      $('#save').attr('data-toggle','modal');
    }

}
function checkform23() {
    if(document.frmMr.total.value == "") {
        alert("please enter right amount");
        $('#check1').attr('data-target','#dfd');
        return false;
    }
    else if(document.frmMr.rootscheme.value == "")
    {
       alert("please select RootScheme");
        return false;
    }
    else if(document.frmMr.scheme.value == "")
    {
       alert("please select scheme ");
        return false;
    }
    else {
         $('#check1').attr('data-target','#myModal');
    }
}
</script>

 <script type="text/javascript">
    $('#Discount1').on('keyup',function(){
       
        var result=Number(0);
     var result1 = Number((Number($('#BasePrice').val()) / 100) * Number($("#Discount1").val()));
     var result2 = Number($("#Discount2").val());
     // result=Number(result1+result2);
     result=Number(result1);
      var per=Number(result1);
       $('#Discount2').val(Math.round(per));
     
     var result = Number((Number($('#BasePrice').val()) / 100) * Number($("#Discount1").val()));
     var sum=Number(0);
     var totaldiscount = Number($("#FinalAmount").val());
     $('#totaldiscount').val('');
      $('#totaldiscount').val(Math.round(isNaN(result) ? 0 : result)); 
      sum=Number((Number($("#BasePrice").val()))-result);
      if(result){
          $('#FinalAmount').val(Math.round(isNaN(sum) ? totaldiscount : sum));
      }
      else if(result==''){
         $('#FinalAmount').val(Math.round(totaldiscount));
      }
      else 
        $('#FinalAmount').val(Math.round(totaldiscount));
      $('#FinalAmount').val(Math.round(sum));
          var tax = "<?php echo $tax ?>";
        var ff = Number((Number(sum)) / 100) * Number(tax);
      ff=Number(sum+ff);
      $('#FinalAmount').val(Math.round(ff));
      
     // $('#total').val(Math.round(sum));
          calculate();



           //shows value in "#rate"
  

   });
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
 $('#Discount2').on('keyup',function(){

      var result=Number(0);
     var result1 = Number((Number($('#BasePrice').val()) / 100) * Number($("#Discount1").val()));
     var result2 = Number($("#Discount2").val());
     // result=Number(result1+result2);
        var per=Number((result2 / (Number($('#BasePrice').val())))*100);
        $('#Discount1').val(Math.round(per));
   //  $('#Discount1').val(per);
     result=Number(result2);
     var sum=Number(0);
     var totaldiscount = Number($("#FinalAmount").val());
     $('#totaldiscount').val('');
      $('#totaldiscount').val(Math.round(isNaN(result) ? 0 : result)); 
      sum=Number((Number($("#BasePrice").val()))-result);
      if(result){
          $('#FinalAmount').val(Math.round(isNaN(sum) ? totaldiscount : sum));
      }
      else if(result==''){
         $('#FinalAmount').val(Math.round(totaldiscount));
      }
      else 
        $('#FinalAmount').val(Math.round(totaldiscount));
      $('#FinalAmount').val(Math.round(sum));
          var tax = "<?php echo $tax ?>";
         var ff = Number((Number(sum)) / 100) * Number(tax);
      ff=Number(sum+ff);
      $('#FinalAmount').val(Math.round(ff));
      
     // $('#total').val(Math.round(sum));
          calculate();



           //shows value in "#rate"
  

   });
</script>
</script>

<script type="text/javascript">
  $('#submit').on('click',function() {
    // alert('hi');
      // $('#myModal').modal('hide');
      var FinalAmount = $('#FinalAmount').val();
       var total = $('#total').val();
       // alert('sdfsd');
var url = "dashboard";
       window.location.href = url;
        window.location = "/page/success" 
    // if(FinalAmount == total)
    //    // $("#myModal").css("display", "block");
    //  return true;
    //    else {
    //     return true;}
    });
</script>
<script>
// we used jQuery 'keyup' to trigger the computation as the user type
 $('.price').on('change',function(){
 
    // initialize the sum (total price) to zero
    // var sum = 0;
    //   var FinalAmount = $('#FinalAmount').val();
    // // we use jQuery each() to loop through all the textbox with 'price' class
    // // and compute the sum for each loop
    // $('.price').each(function() {
    //     sum += Number($(this).val());
    // });
    //  $('#total').val(sum);
    //  $('#remainingamount').val('');
     calculate();
      // if(Number(total)==Number(FinalAmount))
      // {
      //     $('#remainingamount').val(0);
      // }
    // set the computed value to 'totalPrice' textbox
 
});
</script>

<script type="text/javascript">
  function calculate(){
     var sum = 0;
     $('.price').each(function() {
        sum += Number($(this).val());
    });
     $('#total').val(sum);
     $('#remainingamount').val('');
     var sum2 = $('#total').val();
     var FinalAmount = $('#FinalAmount').val();
     if(Number(sum2) < Number(FinalAmount)){
      var r = Number(FinalAmount) - Number(sum2);
      if(Number(r)>0){

       $('#remainingamount').val(Math.round(Number(r)));
      }
      else{
        $('#remainingamount').val(0);
      }

      // return false;
     }
     else if(Number(sum2) > Number(FinalAmount)){
        alert('Please Enter valid amount');
        $('.price').val('');
        $('#total').val('');
     }
  }
</script>

<script type="text/javascript">
 $('.check').on('change',function(){
   // event.preventDefault();
  // var searchIDs = $('input[type="checkbox"]').map(function(){     return $(this).val();    }).get(); // <----
     // $next = $('input[type="checkbox"]').next('td').find('[type=text]');
     //  $next.attr('required','required');
     var x= true;
          $('input[type="checkbox"]').map(function(){
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]:first').val();
              $(this).closest('tr').find('[type=text]').prop("disabled", false);
               $(this).closest('tr').find('[type=text]:first').attr('required','');
             // $(this).closest('tr').find('[type=text]').prop("disabled", false).attr('required','');
                if (y == "")
                {
                  // alert("kindly enter values of selected PaymentType !");
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
 $('#disabled').on('change',function(){
  
     var x= true;
       if($('#CashCredit').val()>=$('#CashCreditAmount').val()){
        
            if($(this).prop("checked") == true){
              var y=  $(this).closest('tr').find('[type=text]:last').val();
             $(this).closest('tr').find('[type=text]:last').prop("disabled", false);
               $(this).closest('tr').find('[type=text]:last').attr('required','');
                if (y == "")
                {
                  // alert("kindly enter values of selected PaymentType !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){

                 $(this).closest('tr').find('[type=text]').attr("disabled", "disabled");
                 
              
            }
       
          //alert(x);
       if (x == false)
         return false;
       else
        return true;
    }
    else{
     return false;
    }
  });
</script>
  <script type="text/javascript">
  $('#rootscheme').on('change',function(){
    $('#BasePrice').val('');
        $('#FinalAmount').val('');
         $('#MembershipAmount').val('');
         $('#Discount2').val('');
          $('#Discount1').val('');
          $('#total').val('');
           $('#totaldiscount').val('');
           $('#finishdate').val('');
      $('#scheme').find('option:not(:first)').remove();
     var id = $('#selectusername').val();
    
  // $('#scheme').find('option').remove();
       var name=document.getElementById("rootscheme").value;
       var _token = $('input[name="_token"]').val();
       if(name)
       {
       $.ajax({
            url:"{{ route('scheme') }}",
            method:"POST",
            data:{name:name,id:id, _token:_token},
            success:function(result)
            {
              var data=result;
              $.each(data, function(i,item){
                  // $('#scheme').append('<option value="'+item.id+'">'+item.SchemeName+'</option>');
                  $('#scheme').append($("<option></option>").attr("value",item.schemeid).text(item.schemename));

              })
              // var x = document.getElementById("startingdate").value;
              //     var date = new Date(x);
              //       // alert(date);
              //    date.setDate(date.getDate() + 31);
              //      // alert(date);
              //      var month = date.getUTCMonth() + 1; //months from 1-12
              //     var day = date.getUTCDate();
              //     var year = date.getUTCFullYear();
              //     if(day.toString().length <= 1) {
              //         day = '0' + day;
              //     }
              //      if(month.toString().length <= 1) {
              //         month = '0' + month;
              //     }  
              //     newdate = day + "-" + month + "-" + year ;
              //     // alert(newdate);
              //     $('#finishdate').val(newdate);
            },
            dataType:"json"
           })
      }
  });
   $(".number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(this).find('.errmsg').html("Digits Only are allowed gbghbdfhbdbdfgbdfgfv").show().fadeOut("slow");
               return false;
    }
   });
   $('#scheme').on('change',function(){
    assigndate();
   });
  function assigndate(){
   $('#MembershipAmount').val('');
        $('#finishdate').val('');
     
  // $('#scheme').find('option').remove();
       var name = document.getElementById("scheme").value;
       var _token = $('input[name="_token"]').val();
         
       if(name)
       {
       $.ajax({
            url:"{{ route('schemeActualPrice') }}",
            method:"POST",
            data:{name:name, _token:_token},
            success:function(result)
            {
              var data=result;
             $.each(data, function(i,item){

                
                   $('#MembershipAmount').attr("value",item.schemeid).val(item.actualprice);
                     $('#BasePrice').attr("value",item.schemeid).val(item.baseprice);
         $('#FinalAmount').attr("value",item.schemeid).val(item.actualprice);

                var x = document.getElementById("startingdate").value;
                 var date = new Date(x);
                   
                      var days=item.numberofdays-1;
                     
                 date.setDate(date.getDate(x) + parseInt(days));
                   // alert(date);
                   var month = date.getUTCMonth() + 1; //months from 1-12
                  var day = date.getUTCDate();
                  var year = date.getUTCFullYear();
                  if(day.toString().length <= 1) {
                      day = '0' + day;
                  }
                   if(month.toString().length <= 1) {
                      month = '0' + month;
                  }  
                  newdate = day + "-" + month + "-" + year ;
                  // alert(newdate);
                   $('#finishdate').val('');
                  $('#finishdate').val(newdate);
              })
                  
            },
            dataType:"json"
           })
      }
  }

</script>
<script type="text/javascript">
    $('#username').on('keyup',function(){
      // alert("hi");
    var error_username = '';
    var username = $('#username').val();
    var _token = $('input[name="_token"]').val();

     $.ajax({
      url:"{{ route('MemberController.check') }}",
      method:"POST",
      data:{username:username, _token:_token},
      success:function(result)
      {
       if(result == 'unique')
       {
        $('#error_username').html('<label class="text-success">User Name is Valid</label>');
        $('#username').removeClass('has-error');
        $('#firstbtn').attr('disabled', false);
       }
       else
       {
        // alert("hi1");
        $('#error_username').html('<label class="text-danger">User Name is Already Exist</label>');
        $('#username').addClass('has-error');
        $('#firstbtn').attr('disabled', 'disabled');
       }
      }
     })

 });
</script>

@endsection