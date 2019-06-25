@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Edit Member</h2></section>
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
    @if($message=="Succesfully added")
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message=="User Is Already Exits")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
@endif 


      <form action="{{ url('editMember/'.$id) }}" method="post" enctype="multipart/form-data">  {{ csrf_field() }}
          <div class="box box-primary" id="firststep">

            <div class="box-header with-border">
              <h3 class="box-title">Edit Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" ><div class="col-lg-6"><h4><u>Personal Details</u></h4> 
              <div class="form-group">
             <label>Date</label>
             
                <input placeholder="date" type="date" class="form-control" name="Created_date" class="span11" value="{{Carbon\Carbon::today()->format('Y-m-d')}}">
            
            </div>

             <div class="form-group">
              <label>First Name</label>
             
                <input type="text"  name="firstname" class="form-control"placeholder="firstname"  class="span11" value="{{$member->firstname}}" />
              </div>
             <div class="form-group">
              <label>LastName</label>
             
                <input type="text"  name="lastname" class="form-control"placeholder="LastName"  class="span11" value="{{$member->lastname}}" />
              </div>
               <div class="form-group">
              <label>User Name</label>
             
                <input type="text"  name="username" id="username" class="form-control"placeholder="User Name"  value="{{$useredit->username}}" class="span11" /><span id="error_username"></span>
              </div>
                    <div class="form-group">  <label>Gender</label>
                  
                    <label>
                      <input type="radio" name="gender"  value="female" {{ $useredit->Member->gender == 'female' ? 'checked' : ''}} >
                      Female
                    </label>
                
                    <label>
                      <input type="radio" name="gender"  value="Male"{{ $useredit->Member->gender == 'Male' ? 'checked' : ''}}>
                      Male
                    </label>
                  </div>
            <div class="form-group">
              <label>Email</label>
             
                <input type="email"  name="email" class="form-control"placeholder="Email Id"  class="span11" value="{{$useredit->Member->email}}" />
              </div><div class="form-group">
              <label>Where did you Hear About..</label>
             
                <input type="text"  name="hearabout" class="form-control"placeholder="Hear About"  class="span11" value="{{$member->HearAbout}}"/>
              </div>
              <div class="form-group">
             <label>Cell Phone Number</label>
             
                <input type="text" name="CellPhoneNumber" id="MobileNo" 
 class="form-control number" placeholder="Cell Phone Number"   class="span11" value="{{$useredit->Member->CellPhoneNumber}}"/>
               </div>
               <div class="form-group">
             <label>Profession</label>
             
                <input type="text" class="form-control" name="profession" placeholder="Profession" class="span11" value="{{$useredit->Member->Profession}}" />
             
            </div>
              <div class="form-group">
             <label>Birthdate</label>
             
                <input placeholder="Birthdate" type="date" class="form-control" name="birthday" class="span11" value="{{$member->Birthday}}">
            
            </div>
              <div class="form-group">
             <label>Anniversary</label>
             
                <input placeholder="Anniversary" type="date" class="form-control" name="anniversary" class="span11" value="{{$member->Anniversary}}">
            
            </div>
              <div class="form-group">
             <label>Working hours</label><br>
             <span><label>From</label></span>
             <input type="time" class="form-control"  name="working_hour_from_1"
                min="9:00 am" max="12:00 pm"  value="{{$useredit->Member->  working_hour_from}}" />
                  
             <label>To</label> 
                <input type="time" class="form-control"  name="working_hour_to_1"
                min="9:00 pm" default="09:pm"    value="{{$member->working_hour_to }}" />
        
              
         
            </div><hr style="border-width: 2px;border-color: black">
                 <div class="raw-md-6"><h4><u>Medical Information</u></h4>
              <div class="form-group">
             <label>A</label>
             
                <input type="text" name="SpecificGoalsa" class="form-control"  class="span10" value="{{$member->Fitnessgoals->SpecificGoalsa}}"/>
               </div>
               <div class="form-group">
             <label>B</label>
             
                <input type="text" name="SpecificGoalsb" class="form-control"  class="span10" value="{{$member->Fitnessgoals->SpecificGoalsb}}"/>
               </div>
               <div class="form-group">
             <label>C</label>
             
                <input type="text" name="SpecificGoalsc" class="form-control"  class="span10"  value="{{$member->Fitnessgoals->SpecificGoalsc}}"/>
               </div>
           
           </div>  
           <hr style="border-width: 2px;border-color: black">
                 <div class="raw-md-6"><h4><u>Medical Information</u></h4> <label>What areas can personal trainer can help you?</label>
                  <div class="box content-fit-box">
                 
                  <br>
                  <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"><tr>
                <td><label>
                     <input type="checkbox" name="fitnessgoals[]"  value="1"{{ $member->Fitnessgoals->LoseBodyFat == '1' ? 'checked' : ''}} > LoseBodyFat</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="2"{{ $member->Fitnessgoals->DevelopMuscle == '1' ? 'checked' : ''}}> DevelopMuscle</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="3"{{ $member->Fitnessgoals->RehabilitateAnInjury == '1' ? 'checked' : ''}}> RehabilitateAnInjury </label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="4"{{ $member->Fitnessgoals->ImproveBalance == '1' ? 'checked' : ''}}> ImproveBalance </label></td></tr>
                <tr><td><label>
                     <input type="checkbox" name="fitnessgoals[]"  value="5"{{ $member->Fitnessgoals->  ImproveFlexibility == '1' ? 'checked' : ''}}> ImproveFlexibility</label></td>
                
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="6"{{ $member->Fitnessgoals->NutritionalEducation == '1' ? 'checked' : ''}}> NutritionalEducation</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="7"{{ $member->Fitnessgoals->DesignBeginnersProgram == '1' ? 'checked' : ''}}> DesignBeginnersProgram</label></td>
                
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="8"{{ $member->Fitnessgoals->DesignAdvancedProgram == '1' ? 'checked' : ''}}> DesignAdvancedProgram</label></td></tr>
                
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="9"{{ $member->Fitnessgoals->TrainSpecific == '1' ? 'checked' : ''}}> TrainSpecific</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="10"{{ $member->Fitnessgoals->Safety == '1' ? 'checked' : ''}}> Safety</label></td></tr>
                 <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="11"{{ $member->Fitnessgoals->MakeExerciseFun == '1' ? 'checked' : ''}}> MakeExerciseFun</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="12"{{ $member->Fitnessgoals->Motivation == '1' ? 'checked' : ''}}> Motivation</label></td></tr>
                  <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="1"{{ $member->Fitnessgoals->Other == '1' ? 'checked' : ''}}> Other</label></td>
                    <td><textarea  name="OtherHelp" placeholder="OtherHelp"class="span2" value="{{$member->Fitnessgoals->OtherHelp}}"></textarea></td></tr></table></div> </div> 
            
                       <!--    Anniversary SpecificGoalsa  SpecificGoalsb  SpecificGoalsc  -->     
           </div> 
              <div class="col-lg-6"><h4><u>Contact Details</u></h4>
              <div class="form-group">
             <label>Address</label>
             
            <textarea rows="2" cols="20" name="Address" wrap="soft" class="form-control"  placeholder="Address" class="span11" >{{$member->add}}</textarea>
               </div>
             <div class="form-group">
              <label>City</label>
             
                <input type="text"  name="City" class="form-control"placeholder="City"  class="span11" value="{{$member->city}}" />
              </div>
             <div class="form-group">
           
          
             <label>Home Phone Number</label>
             
                <input type="text" name="HomePhoneNumber" class="form-control number" placeholder="Home Phone Number"   class="span11" value="{{$member->CellPhoneNumber}}"  />
                &nbsp;<span class="errmsg"></span>
               </div>
           
                 
            
            <div class="form-group">
             <label>Office Phone Number</label>
             
                <input type="text" name="OfficePhoneNumber" class="form-control number" placeholder="Office Phone Number"   class="span11" value="{{$member->OfficePhoneNumber}}"/>
                &nbsp;<span class="errmsg"></span>
               </div>
           <hr style="border-width: 2px;border-color: black">
           </div>
               <div class="col-md-6"><h4><u>Contact Details Emergancy</u></h4>
                
             <div class="form-group">
             <label>Emergancy Name</label>
             
                <input type="text" name="emergancyname"  class="form-control" placeholder="EmergancyName"   class="span11"value="{{$member->EmergancyName}}" />
               </div>
            
             <div class="form-group">
             <label>Emergancy Relation</label>
             
                <input type="text" name="emergancyrelation" class="form-control" placeholder="EmergancyRelation"  value="{{$member->EmergancyRelation}}" class="span11" />
               </div>
           
             <div class="form-group">
             <label>Emergancy Address</label>
             
            <textarea rows="2" cols="20" name="emergancyaddress" wrap="soft" class="form-control"  placeholder="Emergancy Address" class="span11">{{$member->EmergancyAddress}}</textarea>
               </div>
             <div class="form-group">
             <label>Emergancy Phone Number</label>
             
                <input type="text" name="EmergancyPhoneNumber" class="form-control number" placeholder="EmergancyPhoneNumber"  value="{{$member-> EmergancyPhoneNumber}}"  class="span11" />&nbsp;<span class="errmsg"></span>
               </div>
     
              <div class="form-group">
             <label>Photo</label>
             
                <input type="file" name="file"class="form-control"  class="span11" />
               </div>
                 <hr style="border-width: 2px;border-color: black">
             </div>
               <div class="col-md-6"><h4><u>Exercise Program</u></h4>
                <div class="box content-fit-box">
             <div class="form-group">  <label>What activities interest you ?</label>
              <table class="table table-bordered table-striped dataTable table-wrapper" role="grid" aria-describedby="example1_info"><tr>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="1" {{ $member->ExerciseProgram->Baseball == '1' ? 'checked' : ''}}> Baseball </label></td>
                    <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="2" {{ $member->ExerciseProgram->Basketball == '1' ? 'checked' : ''}}> Basketball </label></td> 
                <td><label>
                    <input type="checkbox" name="exerciseprograms]"  value="3" {{ $member->ExerciseProgram->Boxing == '1' ? 'checked' : ''}}> Boxing</label></td></tr>
                    
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="4"{{ $member->ExerciseProgram->KickBoxing == '1' ? 'checked' : ''}}> KickBoxing</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="5"{{ $member->ExerciseProgram->Skiing == '1' ? 'checked' : ''}}> Skiing</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="6"{{ $member->ExerciseProgram->Football == '1' ? 'checked' : ''}}> Football</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="7"{{ $member->ExerciseProgram->Golf == '1' ? 'checked' : ''}}> Golf</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="8"{{ $member->ExerciseProgram->Hiking == '1' ? 'checked' : ''}}> Hiking</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="9"{{ $member->ExerciseProgram->Pilates == '1' ? 'checked' : ''}}> Pilates</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="10"{{ $member->ExerciseProgram->Racquetball == '1' ? 'checked' : ''}}> Racquetball</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="11"{{ $member->ExerciseProgram->IndoorCycling == '1' ? 'checked' : ''}}> IndoorCycling</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="12"{{ $member->ExerciseProgram->Kayaking == '1' ? 'checked' : ''}}> Kayaking</label></td> </tr>
                 <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="13"{{ $member->ExerciseProgram->RockClimbing == '1' ? 'checked' : ''}}> RockClimbing</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="14"{{ $member->ExerciseProgram->Running == '1' ? 'checked' : ''}}> Running</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="15"{{ $member->ExerciseProgram->Soccer == '1' ? 'checked' : ''}}> Soccer</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="16"{{ $member->ExerciseProgram->Swimming == '1' ? 'checked' : ''}}> Swimming</label></td>

                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="17"{{ $member->ExerciseProgram->Tennis == '1' ? 'checked' : ''}}> Tennis</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="18"{{ $member->ExerciseProgram->Triathlon == '1' ? 'checked' : ''}}> Triathlon</label></td></tr>
               <tr> <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="19"{{ $member->ExerciseProgram->Walking == '1' ? 'checked' : ''}}> Walking</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="20"{{ $member->ExerciseProgram->WeightTrainning == '1' ? 'checked' : ''}}> WeightTrainning</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="21"{{ $member->ExerciseProgram->Yoga == '1' ? 'checked' : ''}}> Yoga</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="22"{{ $member->ExerciseProgram->Stretching == '1' ? 'checked' : ''}}> Stretching</label></td></tr>
               <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="23"{{ $member->ExerciseProgram->Other== '1' ? 'checked' : ''}}> Other</label></td>
                    <td><textarea name="OtherActivity" placeholder="OtherActivity"class="span2"></textarea></td></tr></table></div>

                    <!-- OtherActivity
                <td><label>
                    <input type="checkbox" name=""  value="1g">OftenWeekExercise</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                    </table>
                  </div>
                    <div class="form-group">
                      <label>What activities interest you ?</label>
                      <tr>
             <label>Emergancy Phone Number</label>
          <td><input type="checkbox" name="terms[]" value="1el></label></td>
 -->
   
               </div>
           
            <div class="form-group">
             <label>How often a week whould you like to exercise ?</label>
             
                <input type="text" name="OftenWeekExercise" class="form-control" placeholder="Often Week Exercise" class="span11" value="{{$member->ExerciseProgram->OftenWeekExercise}}" />
               </div>
           <div class="form-group">
             <label>Where do you rank in health in your life ?</label> 
             <br>
                <label>
                      <input type="radio" name="rank"  value="h1" {{ $member->ExerciseProgram->HighPriority == '1' ? 'checked' : ''}}>                    HighPriority
                    </label>
                
                    <label>
                      <input type="radio" name="rank"  value="m1" {{ $member->ExerciseProgram->MediumPriority == '1' ? 'checked' : ''}}>                     MediumPriority
                    </label>

                    <label>
                      <input type="radio" name="rank"  value="l1" {{ $member->ExerciseProgram->LowPriority == '1' ? 'checked' : ''}}>                      LowPriority
                    </label>
               </div>
                <div class="form-group">
             <label>How commited are you towards reaching your goals ?</label>
             <br>
                <label>
                      <input type="radio" name="goal"  value="v1" {{ $member->ExerciseProgram->Very == '1' ? 'checked' : ''}}>                   Very
                    </label>
                
                    <label>
                      <input type="radio" name="goal"  value="s1" {{ $member->ExerciseProgram->Semi == '1' ? 'checked' : ''}}>                    Semi
                    </label>

                    <label>
                      <input type="radio" name="goal"  value="b1" {{ $member->ExerciseProgram->Barely == '1' ? 'checked' : ''}}>                      Barely
                    </label>
               </div>

           </div>
           <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-blue margin">
         Save</button>
         <a href="{{ url('members') }}"class="btn bg-red margin">Cancel</a>

        </div></div>
          </div> 
        </div>
          </form>
          
      
            
            <!-- /.box-body -->
        
  </div>
  </div>

</section>
<script type="text/javascript">

 $('#closemodal').on('click',function(){
   $("#modal-default").css("display", "none");
     $("#modal-default").removeClass('in');
       $("#modal-default").addClass('out');
   });
  $('#closemodal1').on('click',function(){
   $("#modal-default").css("display", "none");
     $("#modal-default").removeClass('in');
       $("#modal-default").addClass('out');
   });
 ///
//    $('#secondstep').show('slow', function() {
//     alert('dsf');
//     $(this).trigger('isVisible');
//     });
//    function isVisible(){
//   alert('gfsdf');

// }
  // $(document).ready(function(){
  //   console.log('return');
  //      var x= true;
  //      var j=0;
  //      
  //      alert(value);

  //         $('input[type="checkbox"]').map(function(){
  //           if($(this).prop("checked") == true){
  //             var y=  $(this).closest('tr').find('[type=text]').val();
  //            $(this).closest('tr').find('[type=text]').prop("disabled", false).attr('required','').val(value);
  //               if (y == "")
  //               {
                 
  //                x= false;
  //             }
  //           }
  //           else if($(this).prop("checked") == false){
              
  //           }
  //       });
  //         //alert(x);
  //      if (x == false)
  //        return false;
  //      else
  //       return true;
  // });

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
       alert('Enter right Amount');
       // $("#modal-default").addClass('in');
        return false;}
    });
</script>
<script>
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price2').keyup(function () {
 
    // initialize the sum (total price) to zero
    var sum = 0;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price2').each(function() {
        sum += Number($(this).val());
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#total').val(sum);
     
});
</script>

<script type="text/javascript">

   window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
  </script>

<script type="text/javascript">
 $('#firstbtn').on('click',function(){
    var username = $('#username').val();
    // alert(username);
    var mobileno = $('#MobileNo').val();
    var _token = $('input[name="_token"]').val();
     var id = '{{ $useredit->id }}';
    
    // alert("hi");
    $.ajax({
      url:"{{ route('edituser') }}",
      method:"POST",
      data:{username:username, id:id, mobileno:mobileno, _token:_token},
      success:function(result) 
      {
        // alert(result);
       $('#selectusername').append('<option selected="selected" value="'+result+'">'+$('#username').val()+'</option>');
       $('#selectmoblieno').append('<option selected="selected" value="'+$('#MobileNo').val()+'">'+$('#MobileNo').val()+'</option>');
        // alert("hi1");
        $('#firststep').hide();
        $('#secondstep').show();
      },
      // dataType:"json"
    })
 });

</script>
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
                  $(this).closest('tr').find('[type=text]').attr("disabled", "disabled").val('');

              
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
                  // $("select option").each(function(){
                     // var simple = '';
                  //   if ($(this).val() == simple){
                  //     // alert('dc');
                  //      $(this).attr("selected","selected");
                  //   }

                  // });

              })
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
  // $('#scheme').on('change',function(){
  //  $('#MembershipAmount').val('');
     
  // // $('#scheme').find('option').remove();
  //      var name = document.getElementById("scheme").value;
  //      var _token = $('input[name="_token"]').val();
  //      if(name)
  //      {
  //      $.ajax({
  //           url:"{{ route('schemeActualPrice') }}",
  //           method:"POST",
  //           data:{name:name, _token:_token},
  //           success:function(result)
  //           {
  //             var data=result;
  //            $.each(data, function(i,item){

                
  //                  $('#MembershipAmount').attr("value",item.id).val(item.ActualPrice);
  //                    $('#BasePrice').attr("value",item.id).val(item.BasePrice);
  //        $('#FinalAmount').attr("value",item.id).val(item.ActualPrice);
  //             })
                  
  //           },
  //           dataType:"json"
  //          })
  //     }
  // });

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