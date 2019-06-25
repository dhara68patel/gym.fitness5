@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">

         <section class="content-header"><h2>Package</h2></section>
          <!-- general form elements -->
           <section class="content">
         
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Edit Package</h3>
            </div>

      
          
            <div class="box-body">
               <div class="col-lg-10"><h4><u>User Details</u></h4> 
       <form action="{{ url('editpackage/'.$id) }}" method="POST">
        {{ csrf_field() }}
                <div class="col-lg-6">
                  <div class="input-group">
                    <label>Username</label>
                        
                          <select name="selectusername" id="selectusername"   disabled="true" class="form-control"><option selected disabled="">--Please choose an option--</option>@foreach($users as $user)
              <option value="{{ $useredit->id }}" selected>{{ $useredit->username }}</option>@endforeach
          </select>
                       
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                        <label>Mobile No:</label>
           <select name="selectmobileno" id="selectmoblieno"  disabled="true" class="form-control" ><option selected disabled="">--Please choose an option--</option>@foreach($users as $user)
              <option value="{{ $useredit->MobileNo }}" selected="">{{ $useredit->MobileNo }}</option>@endforeach
          </select>
                   
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
           
           
               </div>
               <div class="col-lg-12">
                     <hr style="border-width: 2px;border-color: black"> <h4><u>Assign Package</u></h4> 
               <div class="col-lg-5">
              
              <div class="form-group">
             <label>Select Root Scheme</label>
             
                <select name="RootSchemeId" id="rootscheme" class="form-control"class="span11"><option selected disabled="">--Please choose an option--</option>@foreach($RootScheme as $rscheme)
              <option value="{{ $rscheme->id }}" {{ $edit->Scheme->RootSchemeId == $rscheme->id ? 'selected' : ''}}>{{ $rscheme->scheme_name }}</option>@endforeach
          </select>
              </div>
              <div class="form-group">
             <label>Select Package</label>
             
                <select name="SchemeID" id="scheme" class="form-control"class="span11"><option selected disabled=""   >--Please choose an option--</option>@foreach($Schemes as $scheme)
                  $rscheme)
              <option value="{{ $scheme->id }}" {{ $edit->Scheme_id == $scheme->id ? 'selected' : ''}}>{{ $scheme->SchemeName }}</option>@endforeach
          </select>
              </div>
             
             <div class="form-group">
             <label>Membership Amount</label>
             <input type="text" name="MembershipAmount" id="MembershipAmount" class="form-control" placeholder="Membership Amount"   class="span11"  value="{{$edit->Scheme->ActualPrice}}"/>
               
              </div>
              <div class="form-group">
             <label>Base Amount</label>
             <input type="text" name="BaseAmount" id="BasePrice" class="form-control" placeholder="Base Amount"   class="span11" disabled="" value="{{$edit->Scheme->BasePrice}}"/>
               
              </div>
              <div class="form-group">
             <label>Final Amount</label>
             <input type="text" name="ActualAmount" id="FinalAmount"class="form-control" placeholder="Final Amount"   class="span11" value="{{$edit->Scheme->ActualPrice}}" />
               
              </div>
         </div>

          <div class="col-md-5">
                

             <div class="form-group">
             <label>Join Date</label>
             
                <input placeholder="Joining date" type="date"  value="{{$edit->Join_date}}" class="form-control" name="Join_date" class="span11" >
            
            </div>
               <div class="form-group">
             <label>Finish Date</label>
             
                <input placeholder="finishing date" type="date" class="form-control" name="Expire_date" class="span11" value="{{$edit->Expire_date}}">
            
            </div>
                 <div class="form-group">
             <label>Discount 1</label>
             
               <input type="text" name="Discount" id="Discount1" class="form-control" placeholder="Discount1"  value="" class="span11" />
            
            </div>
         
            
      
            <div class="form-group">
             <label>Total Discount</label>
             
               <input type="text" name="TotalDiscount" class="form-control" placeholder="TotalDiscount"   class="span11" disabled="" />
                 <input type="hidden" name="PaymentDate"  value="{{Carbon\Carbon::today()->format('Y-m-d')}}" />
            
            </div>
              
         </div>

       </div>
       <div class="col-lg-8">
        <table>
      <div class="form-group">
       
            
             <tr><td>
                    <input type="checkbox" name="exerciseprograms[]"  value="21"> <label>Cash Credit </label> &emsp;</td>
             <td> <input type="text"  class="form-control" placeholder="CashCredit"   class="span9" value="{{$member->amount}}"/></td>&emsp;
              <td> <input type="text" name="CashCreditcheck" class="form-control price2" placeholder="CashCreditcheck"   class="span9" disabled="" value="" /></td></tr>
            
            </div>
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
            <tbody>
              <?php $i=count($Payment);
          $i=$i-1;
            $j=0;
            $n1=0;
             ?>
        <?php 
        // $amounttotal=0;
        for($no=0;$no<count($PaymentTypes);$no++)
        {
          // echo $PaymentTypes[$no]['PaymentType'];
           $html=' <tr><td>  <input type="checkbox" class="check" name="Mode[]" value="'.$PaymentTypes[$no]['PaymentType'].'"';
                 
          for($n=0;$n<count($Payment);$n++)
          {
            // echo $Payment[$n]['Remarks'];
            if($Payment[$n]['Mode']==$PaymentTypes[$no]['PaymentType'] && $Payment[$n]['SchemeID']!=NULL)
            {
                  $html.='checked';
                   $n1=$n;
                  break;  

            }
            else
            {
              $n1=-1;
            }
           
          }
          $html.='> &emsp;<label>'.$PaymentTypes[$no]['PaymentType'].'</label>&emsp;</td><td><input type="text"
          class="form-control price" onkeyup="price();" name="Amount[]"';
          if($n1==-1)
          {
             $html.=' disabled="" value="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled="" value=""></td></tr>';
          }
          else
          {
            $html.=' value="'.$Payment[$n]['Amount'].'"  name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" value="'.$Payment[$n1]['Remarks'].'"></td></tr>';
            // $amounttotal += $Payment[$n]['Amount'];
          }
              echo $html;  
          }
         ?> 
             <!--  @foreach($PaymentTypes as $PaymentType)

           <tr><td><input type="checkbox" class="check" name="Mode[]" value="{{$PaymentType->id}}" > &emsp;
            <label>{{$PaymentType->PaymentType}}</label>&emsp;
          </td><td><input type="text" class="form-control price"  disabled="" name="Amount[]"></td>&emsp;<td><input type="text"class="form-control" name="Remark[]" disabled=""></td>
        @endforeach</tr> -->
            </tbody>
            
           <!-- <tr><td><input type="checkbox" name="terms[]" value=""><label>Cash</label></td><td><input type="text"class="form-control" name="value[]"></td>
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
                 
             <div class="col-lg-5">
         <table>
               <div class="form-group">

                    <tr><td>
                     <label>Total Amount</label>&emsp;</td>  
             <td><input type="text" value=""  name="CashCredit" class="form-control form-inline" placeholder="Total" id="total"  class="span9" disabled=""/></td></tr></div></table></div>

             <div class="col-lg-5"><table>  <div class="form-group"><tr>
              <td><label>Reciept No.</label> &emsp; </td><td><input type="text" name="RecieptNo" class="form-control" placeholder="RecieptNo" readonly=""  class="span9"  /></td></tr></div></table>
              </div>
              <div class="col-lg-8">
          <div class="form-group">
         <div class="col-sm-offset-3">
              
         <button type="submit" id="submit" class="btn bg-blue margin" >
         Save</button>
         <a href="{{ url('members') }}"class="btn bg-red margin">Cancel</a>

        </div>

          </div>
          </form>
        </div>
      </section>
    </div>
    <script type="text/javascript">
  $('#Discount1').on('keyup',function(){
    
     var result = parseFloat((parseInt($('#MembershipAmount').val()) / 100) * parseInt($("#Discount1").val()));
     var sum=parseFloat(0);
     var totaldiscount = parseInt($("#FinalAmount").val());
     $('#totaldiscount').val('');
      $('#totaldiscount').val(Math.round(isNaN(result) ? 0 : result)); 
      sum=parseFloat((parseInt($("#FinalAmount").val()))-result);
      if(result){
          $('#FinalAmount').val(Math.round(isNaN(sum) ? totaldiscount : sum));
      }
      else if(result==''){
         $('#FinalAmount').val(Math.round(totaldiscount));
      }
      else 
        $('#FinalAmount').val(Math.round(totaldiscount));
    

           //shows value in "#rate"
  

   });
</script>
<script type="text/javascript">
  $('#submit').on('click',function() {
      var FinalAmount = $('#FinalAmount').val();
       var total = $('#total').val();
    if(FinalAmount == total)
     return true;
       else{
        // $("#modal-default").css("display", "block");
      alert('Please Enter right Amount')

        return false;}
    });
</script>
<script>
  $(document).ready(function(){
    price();
  });
// we used jQuery 'keyup' to trigger the computation as the user type
 function price () {
 
    // initialize the sum (total price) to zero
    var sum = 0;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price').each(function() {
        sum += Number($(this).val());
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#total').val(sum);
     
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
                  alert("kindly enter values of selected PaymentType !");
                 x= false;
              }
            }
            else if($(this).prop("checked") == false){

                 $(this).closest('tr').find('[type=text]').attr("disabled", "disabled");
             
              
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
                  alert("kindly enter values of selected PaymentType !");
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
      $('#scheme').find('option:not(:first)').remove();
  // $('#scheme').find('option').remove();
       var name=document.getElementById("rootscheme").value;
       var _token = $('input[name="_token"]').val();
       if(name)
       {
       $.ajax({
            url:"{{ route('scheme') }}",
            method:"POST",
            data:{name:name, _token:_token},
            success:function(result)
            {
              var data=result;
              $.each(data, function(i,item){
                  // $('#scheme').append('<option value="'+item.id+'">'+item.SchemeName+'</option>');
                  $('#scheme').append($("<option></option>").attr("value",item.id).text(item.SchemeName));

              })
              var x = document.getElementById("startingdate").value;
                  var date = new Date(x);
                    // alert(date);
                 date.setDate(date.getDate() + 31);
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
                  $('#finishdate').val(newdate);
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
   $('#MembershipAmount').val('');
     
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

                
                   $('#MembershipAmount').attr("value",item.id).val(item.ActualPrice);
                     $('#BasePrice').attr("value",item.id).val(item.BasePrice);
         $('#FinalAmount').attr("value",item.id).val(item.ActualPrice);
            var x = document.getElementById("startingdate").value;
            var date = new Date(x);
            var days=item.NumberOfDays;
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
  });

</script>
    @endsection

