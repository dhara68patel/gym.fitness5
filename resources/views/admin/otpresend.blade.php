@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')

 <meta charset="utf-8">
    <title>Otp Resend</title>
   <script src="../js/otherjs/1.js"></script>
       <script src="../js/otherjs/2.js"></script>
       <script src="../js/otherjs/3.js"></script>
       
      <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

     <div id="myModal" class="modal fade  modal-dialog-centered" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-body">
           
                <form id="msform" action="{{url('smspostverify')}}" method="post">
            {{ csrf_field() }}

                    <div class="aftergenerate">

                       <p>Resent OTP Code !</p>

                      <div class="mx-auto" style="height:20px;"></div>

                       <div class="row">
                          <div class="form-group">
                            <div class="col-md-6">

                                 <input type="text" name="mobileno" id="mobileno" class="form-control" placeholder="Please Enter Your Mobile Number For OTP Code Again !" maxlength="9" value="{{$inquiry_mobile_no->mobileno}}" disabled="">

                                 <input type="hidden" name="email" id="email" value="{{$inquiry_mobile_no->email}}">
                            </div>  
                            <div class="col-md-6">
                                <a href="#" class="btn btn-success" name="ResendOtp" id="ResendOtp">Resend OTP</a>
                            </div>                       
                          </div>
                      </div>

                      <div class="row" id="resendverify">
                        <div class="form-group">
                          <div class="col-md-6">
                              <input type="text" name="otp" id="numberotp" class="form-control number" placeholder="Please verify Your OTP Code">
                          </div>
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-success" ondocument="verify()" id="verifyotp">Verify OTP</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){

  
    $("#myModal").modal('show');
    $("#resendverify").hide();

      $('#ResendOtp').click(function(){ 

        $("#resendverify").show();

        var mobileno = $('#mobileno').val();
        var email = $('#email').val();
        
      

        $('#error_message').html('');  
                $.ajax({  
                     
                     type:"POST",  
                    data: {"_token": "{{ csrf_token() }}","mobileno": mobileno,"email": email,},
                    url:'{{ URL::route("smsverify") }}',   
                     success:function(data){
                          
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 2000);  
                     }  
                });  

  });    

  });
 
</script>

@endsection