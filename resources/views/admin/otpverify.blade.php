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

                       <p>Verify OTP Code !</p>

                      <div class="mx-auto" style="height:20px;"></div>

                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-6">
                              <input type="text" name="otp"  id="numberotp" class="form-control number" placeholder="Please verify Your OTP Code">
                          </div>

                           <div class="col-md-6">

                            <div class="col-md-3 col-md-offset-2">
                              <button type="submit" class="btn btn-success" ondocument="verify()" id="verifyotp">Verify OTP</button>
                            </div>

                             <div class="col-md-3 col-md-offset-2">
                              <button type="submit" class="btn btn-success"  id="verifyotp">skip OTP</button>
                            </div>
                              
                          </div>
                        </div>

                        </div>
                      </div>

                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            
          </div>
          
        </div> -->

<script type="text/javascript">

  $(document).ready(function(){
 
    $("#myModal").modal('show');

  });
 
</script>

@endsection