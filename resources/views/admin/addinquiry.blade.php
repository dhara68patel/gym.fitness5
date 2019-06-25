@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')
<style type="text/css">
  body {
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;}
    .sidebar {
    padding-bottom: 100%;
}
</style>
 <meta charset="utf-8">
    <title>Add Inquiry</title>


   <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
   <script src="../../bower_components/bootstrap/js/cdnjs-extra/jquery.min.js"></script>
 <!--     <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="../../bower_components/bootstrap/js/cdnjs-extra/bootstrap.min.js"></script>
     <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
      <script src="../../bower_components/bootstrap/js/cdnjs-extra/jquery.easing.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

    <div class="row">
    <div class="col-md-6 col-md-offset-3">

      @if(count($errors)>0)
      <ul>
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <script type="text/javascript">
        $(window).load(function(){
      setTimeout(function(){ $('.alert-danger').fadeOut() }, 2000);
});
      </script>
        <form id="msform" action="{{url('addinquirydata')}}" method="post">
        <!-- <form id="msform" action="{{url('addinquirydata')}}" method="post"> -->
            {{ csrf_field() }}
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active"><b>Personal Details</b></li>
                <li><b>Tell us something more about you</b></li>
                <li><b>Package And Inquiry Details</b></li>
                <li><b>Create Inquiry</b></li>
            </ul>
            <!-- fieldsets -->
            

            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something about you</h3>
                <input type="text" name="firstname" placeholder="First Name"  onchange="valid()" required id="firstname" class="noonumber" />
                <input type="text" name="lastname"  placeholder="Last Name" required id="lastname" class="noonumber" />

              
                <ul class="donate-now">
                  <li>
                      <!-- <input type="text"> -->
                      <span id="title"><b>Select Gender</b></span>
                  </li>
                  <li>
                      <input type="radio" id="a25" name="gender" value="male" onchange="valid()" />
                      <label for="a25">Male</label>
                  </li>
                  <li>
                      <input type="radio" id="a50" name="gender" value="female" onchange="valid()"/>
                      <label for="a50">Female</label>
                  </li>

                  </ul>
                  <!-- <input type="radio" name="gender" value="male" checked>Male
                  <input type="radio" name="gender" value="female">Female -->
                  <input type="email" name="email" id="email" placeholder="Enter your Email" id="email"onchange="valid()">
                <input type="text" name="phoneno" id="mobileno" placeholder="Phone No" maxlength="10" class="number" required=""onkeyup="valid()" id="mobileno" />
                <input type="button" name="next" class="next action-button" value="Next" id="next1"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Tell us something more about you</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="profession" placeholder="Profession" id="profession"/>
                <label>Already Member in other GYM ?</label>
                <select name="menberinothergym" onchange="memberinothergym();" id="mg">
                  <option value="Yes" id="yes">Yes</option>
                    <option value="No" id="no" selected="">No</option>
                </select><br/><br/>
                
                <textarea type="text" name="note" placeholder="Please Give Details About GYM !" id="am"></textarea>
              <!--   <input type="text" name="menberinothergym" placeholder="Already Member in ohther GYM ?"/> -->
                <label>How Did You Here about us ?</label>
                <select name="hereaboutus" id = "country" required="">
                  <option value="null">-- How Did You Here about us ? --</option>
                  <option value="Fitness Five Member">Fitness Five Member</option>
                  <option value="We Called Them">We Called Them</option>
                  <option value="Friends/Family">Friends / Family</option>
                  <option value="Internet Search Engine">Internet Search Engine</option>
                  <option value="Word of Mouth">Word of Mouth</option>
                  <option value="Radio Advertise">Radio Advertise</option>
                  <option value="Magazine Advertise">Magazine Advertise</option>
                  <option value="other">other</option>
                </select>

                <label>Reference By :</label>
                 <select name="reference">
                  <option value="null">-- Reference By --</option>
                  <option value="advertise">advertise</option>
                  <option value="club_member">club Member</option>
                  <option value="other">other</option>
                </select><br/><br/>

                <textarea type="text" name="remark" placeholder="Remark"></textarea>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"id="next2"/>
            </fieldset>

           <fieldset>
                <h2 class="fs-title">Package And Inquiry Details</h2>
                <h3 class="fs-subtitle">Tell About Interested Package !</h3>
                <label>Package</label>
                <select name="package" id="package" onchange="valid3()">
                  <option value="">--Please Select Package--</option>
                  @if($packages)
                  @foreach($packages as $package)     
                  <option value="{{$package->schemename}}">{{$package->schemename}}</option>
                  @endforeach
                  @endif                
                </select>
               <!--  <script type="text/javascript">
                  function s(){
                    alert($('#package').val());
                  }
                </script> -->
              <!--   <input type="text" name="menberinothergym" placeholder="Already Member in ohther GYM ?"/> -->
                  <label>Point of Contact</label>
                <select name="poc" onchange="valid3()" id="poc">
                  <!-- <option value="null">-- Select Point of Contact --</option> -->
                  <option value="Vicky Shah">Vicky Shah</option>           
                </select>

                <label>Inquiry Type</label>
                 <select name="inquirytype" id="inquirytype" onchange="valid3()" >
                  <!-- <option value="null">-- Reference By --</option> -->
                  <option value="">--Please Select Inquiry Type--</option>
                  <option value="walkin">Walk In</option>
                  <option value="oncall">On Call</option>
                  <option value="app">Application</option>
                  <option value="website">Website</option>
                </select>

                 <label>Inquiry Rate</label>
                 <select name="inquiryrate" id="inquiryrate" onchange="valid3()">
                  <!-- <option value="null">-- Reference By --</option> -->
                  <option value="">--Please Select Inquiry Rate--</option>
                  <option value="superhot">Super Hot</option>
                  <option value="hot">Hot</option>
                  <option value="warm">Warm</option>
                  <option value="cold">Cold</option>
                  <option value="notinterested">Not Interested</option>
                </select><br/><br/>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"id="next3"/>
            </fieldset>



             <fieldset>
              <div class="col-lg-12">
                
            
                <h2 class="fs-title">Create your Inquiry</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <ul class="donate-now-change">
                  <li>
                      <input type="radio" id="Followup" name="readytomember" value="Followup" checked="" />
                      <label for="Followup" style="margin-left: 5px;">Add Followup</label>
                  </li>
                  <li>
                      <input type="radio" id="member" name="readytomember" value="Member" />
                      <label for="member" >Add Member</label>
                  </li>

                  </ul>
                
                 <div id="Followupdetails" class="addfollowers">

                    <div><b>Followup Date</b><input type="date" name="FollowUpDays" value="{{Carbon\Carbon::today()->addDays(3)->format('Y-m-d')}}"></div>
                     <label>Followup Time</label>
                            <select name="ftime">
                              <option value="null">--Please Select Followup Time--</option>
                              <option>Morning</option>
                              <option>Afternoon</option>
                              <option>Evening</option>
                            </select><br/>
                      <label>Specific Time</label><input type="text" name="stime" placeholder="Specific Time">
                 </div>
                
               <!--  <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/> -->
                
              </div>
               <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input   type="submit" value="Submit" class="action-button"  />
            </fieldset>

              </div>

             

          <!--     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" class="action-button" value="Submit"/>
            </fieldset>
 -->
              </div>

        </form>
    </div>
</div>

<script>
    $(".noonumber").keypress(function (e) {
  
     //if the letter is not digit then display error and don't type anything
   e = e || window.event;
    var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
    var charStr = String.fromCharCode(charCode);
    if (/\d/.test(charStr)) {
        return false;
    }
    else{
      return true;
    }
   });

   function valid()
   {

  
     if($('#firstname').val()!="" &&  $('#lastname').val()!="" && $('input[type="radio"]').val()!="" && $('#mobileno').val()!="" &&  $('#email').val()!="")
   {
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,20})$/;
 var email = document.getElementById('email').value;

       if ($('#mobileno').val().length != 10){
          $('#next1').hide();
       }
       else if (reg.test(email) == false) {
         $('#next1').hide();
       }

       else{
         $('#next1').show();
       }
      
   }
   else
   {
      $('#next1').hide();
   }

   }
     $('#next1').hide();
       $('#next3').hide();
    $('#am').hide();
 function valid3()
   {

  
       if($('#inquirytype').val()!="" &&  $('#inquiryrate').val()!="" && $('#poc').val()!="" && $('#package').val()!="")
   {

           $('#next3').show(); 
   }
   else
   {
      $('#next3').hide();
   }

   }

     function memberinothergym(){
                 // alert('sdgf');

        if($('#mg').val()=='Yes'){

        $('#am').show();
       
      }else{
        $('#am').hide();
      }

      
     }

$(document).ready(function(){

  valid();
  memberinothergym();
 
    $("#Followup").click(function(){
    $("#Followupdetails").show();
  });
  $("#member").click(function(){
    $("#Followupdetails").hide();
  });
   
     
 
});
</script>


<script type="text/javascript" src="js/inquiry_multistep.js"></script>

<script type="text/javascript">
 $("#firstname").on("change", function(){
  var j = $(this).val();
  if(j){
   return true
  }
  else{
   
    return false;
  }
 });
 $("#lastname").on("change", function(){
  var j = $(this).val();
  if(j){
   return true
  }
  else{

    return false;
  }
 });

</script>
<script type="text/javascript">
   $("form").submit(function() { 
                    // alert("data"); 
                }); 
</script>

@endsection
