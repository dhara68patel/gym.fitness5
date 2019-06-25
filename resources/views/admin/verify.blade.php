    @extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">

     <div class="content" id="otp">
     	@if($message=="succesfully")
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message=="Please, try again")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
            <h4 class="article-title"><i></i>OTP Verification</h4>
            <div class="accordion-content"><br/>
                <div class="well well-lg">
                	<form action="{{ url('postverify') }}" method="post">
                		{{csrf_field()}}
                    <center>

                     <b><font size="3px">Please Verify OTP for Further Process</font></b> 
                      <br>
                      <br>
                        OTP is sent to Your Mobile No : {{$mobileno}}
                      <br>
                      <br><br>
                  <input type="text" id="code" style="width:30%" class="form-control" name="otp" placeholder="Enter OTP">
                  <br>
                  <br>
                  <input type="submit" name="verify" value="Verify" class="btn bg-orange"style="width:10%">
           	
        

              <a href="{{url('resendotp/'.$mobileno)}}" class="btn bg-blue">Resend OTP</a>
              <!-- OTP is sent to your registered Email Id  -->
                <input type="hidden" name="MobileNo" value="{{$mobileno}}"></center>
                </form>
                </div>

            </div>
          </div>
      </div>
          @endsection
