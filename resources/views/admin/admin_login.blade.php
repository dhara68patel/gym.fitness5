<!DOCTYPE html>
<html lang="en">
<head>
  <title>FITNESSFIVE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{asset('/images/icons/favicon.ico')}}"/>

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
<!--===============================================================================================-->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="../../bower_components/jquery/src/ajax/jquery.min.js"></script>


  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<style type="text/css">
  .alert{
    color: red;
  }
</style>
</head>
<body>

    <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->

  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">



        <form class="login100-form validate-form" action="{{url('check')}}" method="POST">
          {{csrf_field()}}
          <span class="login100-form-title p-b-26">
            Welcome To 
          </span>
          <span class="login100-form-title p-b-48">
            <img src="{{asset('/images/fitness5.png')}}">
          </span>
          

          <div class="wrap-input100 validate-input" data-validate = "">
            <input class="input100" type="text" id="username" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          @if ($message = Session::get('message'))
          <div class="alert alert-danger alert-block" id="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ $message }}</strong>
          </div>
          @endif 
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" id="login" >
                Login
              </button>
            </div>
          </div>

           <div class="text-center p-t-115">
            <span class="txt1">
             Powered By <a href="https://www.weybee.com/">Weybee Solution </a> 
            </span>

          <!--   <a class="txt2" href="https://www.weybee.com/">
             <img src="{{asset('/images/wey_bee_logo.png')}}">
            </a> -->
          </div>

         <!--  <div class="text-center p-t-115">
            <span class="txt1">
              Don’t have an account?
            </span>

            <a class="txt2" href="#">
              Sign Up
            </a>
          </div> -->
        </form>
      </div>
    </div>
  </div>

  <!--
          </script> -->
  

  


<!-- /.login-box -->

<!-- jQuery 3 -->
<!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 --><!-- iCheck
<script src="../../plugins/iCheck/icheck.min.js"></script> -->

</body>
</html>
<script type="text/javascript">
    $(document).ready (function(){
               
               $("#alert").fadeTo(1000, 500).slideUp(500, function(){
               $("#alert").slideUp(500);
                });   
 });
</script>
