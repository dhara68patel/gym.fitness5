@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')

 <meta charset="utf-8">
    <title>Add Inquiry</title>
       <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
   <script src="../../bower_components/bootstrap/js/cdnjs-extra/jquery.min.js"></script>
 <!--     <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="../../bower_components/bootstrap/js/cdnjs-extra/bootstrap.min.js"></script>
     <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
      <script src="../../bower_components/bootstrap/js/cdnjs-extra/jquery.easing.min.js"></script>

      
<!--       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
      <link rel="stylesheet" type="text/css" href="/css/style.css">
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
        <form id="msform" action="{{url('editinquiry/'.$inquiry->inquiriesid)}}" method="Post">
          {{ csrf_field() }}
            <!-- progressbar -->
            <ul id="progressbar"style="margin-left: 180px;">
                <li class="active"><b>Personal Details</b></li>
                <li><b>Tell us something more about you</b></li>
                
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="firstname" placeholder="First Name" required id="firstname" value="{{$inquiry->firstname}}" />
                <input type="text" name="lastname" placeholder="Last Name" required id="lastname"value="{{$inquiry->lastname}}" />
              
                <ul class="donate-now">
                  <li>
                      <!-- <input type="text"> -->
                      <span id="title"><b>Select Gender</b></span>
                  </li>
                  <li>
                      <input type="radio" id="a25" name="gender" value="male" {{$inquiry->gender == 'male'?'checked':'' }} />
                      <label for="a25">Male</label>
                  </li>
                  <li>
                      <input type="radio" id="a50" name="gender" value="female" {{$inquiry->gender == 'female'?'checked':''}} />
                      <label for="a50">Female</label>
                  </li>

                  </ul>
                  <!-- <input type="radio" name="gender" value="male" checked>Male
                  <input type="radio" name="gender" value="female">Female -->
                  <input type="email" name="email" placeholder="Enter your Email" id="email" value="{{$inquiry->email}}">
                <input type="text" name="mobileno" placeholder="Phone No" maxlength="10" class="number" required="" value="{{$inquiry->mobileno}}" />
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Tell us something more about you</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="profession" placeholder="Profession" value="{{$inquiry->profession}}" />


                <input type="text" name="alreaygymmember" placeholder="Already Member in ohther GYM ?" value="{{$inquiry->alreadymember}}" />
                <label>How Did You Here about us ?</label>
                <select name="howknowaboutus" id = "country" required="">
                  <option value="null">-- How Did You Here about us ? --</option>
                  <option value="Fitness Five Member" {{$inquiry->hearabout == 'Fitness Five Member'?'selected':''}}>Fitness Five Member</option>
                  <option value="We Called Them" {{$inquiry->hearabout == 'We Called Them'?'selected':''}}>We Called Them</option>
                  <option value="Friends/Family" {{$inquiry->hearabout == 'Friends/Family'?'selected':''}}>Friends / Family</option>
                  <option value="Internet Search Engine" {{$inquiry->hearabout == 'Internet Search Engine'?'selected':''}}>Internet Search Engine</option>
                  <option value="Word of Mouth" {{$inquiry->hearabout == 'Word of Mouth'?'selected':''}}>Word of Mouth</option>
                  <option value="Radio Advertise" {{$inquiry->hearabout == 'Radio Advertise'?'selected':''}}>Radio Advertise</option>
                  <option value="Magazine Advertise" {{$inquiry->hearabout == 'Magazine Advertise'?'selected':''}}>Magazine Advertise</option>
                  <option value="other" {{$inquiry->hearabout == 'other' ? 'selected':''}}>other</option>
                </select>

                <label>Reference By :</label>
                 <select name="reference">
                  <option value="null">-- Reference By --</option>
                  <option value="advertise"{{$inquiry->referenceby == 'advertise'?'selected':''}}>advertise</option>
                  <option value="club_member"{{$inquiry->referenceby == 'clubmember'?'selected':''}}>club Member</option>
                  <option value="other"{{$inquiry->referenceby == 'other'?'selected':''}}>other</option>
                </select><br/><br/>

                <textarea type="text" name="remarks" placeholder="Remark">{{$inquiry->remarks}}</textarea>

                
             <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit"  class="action-button" value="Submit"/>
            </fieldset>

  </form>
              </div>

      
    </div>
</div>

<script>
$(document).ready(function(){
    $("#Followup").click(function(){
    $("#Followupdetails").show();
  });
  $("#member").click(function(){
    $("#Followupdetails").hide();
  });

});
</script>

<script type="text/javascript" src="/js/inquiry_multistep.js"></script>
<script type="text/javascript">
  $("#email").focusout(function() {
   var email_x = document.getElementById("email").value;
        filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (filter.test(email.value)) {
            document.getElementById("email").style.border = "1px solid green";
            return true;
        } else {
            document.getElementById("email").style.border = "1px solid red";
            return false;
        }
});
</script>
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
