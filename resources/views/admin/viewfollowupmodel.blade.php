@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')

    <link href="../js/datepickerjs/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script type="text/javascript" src="../js/datepickerjs/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/datepickerjs/jquery-ui.js"></script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10000; /* Sit on top */
  padding-top: 20px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fff;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #17BB3A;
  color: white;
}

.modal-body {
  padding: 2px 16px;
}

.modal-footer {
  padding: 2px 16px;
  background-color: #ffffff;
  color: white;
}

label{

  color:#4D504D;

}

h4 b{
  color:#767C77;
}
</style>

<h2>Animated Modal with Header and Footer</h2>



<!-- The Modal -->
<div id="myModal" class="modal" data-backdrop="static" data-keyboard="false">
 @if(count($errors)>0)
      <ul>
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
        @endforeach
      </ul>
      @endif
  <script type="text/javascript">
        $(window).load(function(){
          $('#errorsho').show();
      setTimeout(function(){ $('.alert-danger').fadeOut() }, 1000);
});
      </script>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <a href="{{url('inquiry')}}"><span class="close">&times;</span></a>

         <h3 class="text-uppercase"><b> {{$followupid->firstname}} &nbsp;{{$followupid->lastname}}</b><b>&nbsp;#+91&nbsp;{{$followupid->mobileno}}</b> <span class="pull-right text-uppercase"><b> Date : {{date('j F, Y', strtotime($followupid->createddate))}} </b></span></h3>
      
     
    </div>
    <div class="modal-body">
      <form role="form" action="{{ url('viewfollowupcall/'.$followupid->followupid) }}" method="POST" >
         {{ csrf_field() }}
      <div class="row mx-auto" style="height:20px;"></div>

      <div class="row"  style="height: 20px;"> 
        <div class="form-group">
          <div class="col-md-12">
            <h4><b>Call Details :</b></h4>
          </div>
        </div>
      </div>

      <div class="row mx-auto" style="height:30px;"></div>
      
       <div class="row">
        <div class="form-group">

          <div class="col-md-2 col-md-offset-1">
            <label for="CallCompletedBy">Call Completed By</label>
             <select class="form-control" id="exampleFormControlSelect1" name="callcompletedby">
                <option value="VickyShah">Vicky Shah</option>      
            </select> 
          </div>

          <div class="col-md-3">
            <label for="CallResponse">Call Response</label>
             <select class="form-control" id="exampleFormControlSelect1" name="callresponse">
         <option value="">-- Please Select Call Response --</option>
                <option value="Can't_Pick_up_Your_Call">Can't Pick up Your Call</option>
                <option value="Asked_To_Call_Later">Asked To Call Later</option> 
                <option value="Interested_To_Visit_GYM">Interested To Visit GYM</option> 
                <option value="Not_Interested_In_GYM">Not Interested In GYM</option> 
                <option value="Other">Other</option>      
            </select>
          </div>
                 
                <div class="col-md-6">                   
                      <input  type="hidden" id="calldate" class="form-control" name="calldate" value="<?php echo date("Y-m-d"); ?>"> 
                </div>
       
          <div class="col-md-2">
            <label for="CallDuration">Call Duration</label>
             <select class="form-control" id="exampleFormControlSelect1" name="callduration">
         <option value="">-- Please Select Call Duration --</option>
                <option value="0-30 sec">0-30 sec</option>
                <option value="30-60 sec">30-60 sec</option> 
                <option value="60-90 sec">60-90 sec</option> 
                <option value="Above 90 sec">Above 90 sec</option>                      
            </select>
          </div>

          <div class="col-md-3">
            <label for="CallQulity">Call Rating</label>
            <select class="form-control" id="exampleFormControlSelect1" name="callqulity">
        <option value="">-- Please Select Call Rating --</option>
                <option value="Super Hot">Super Hot</option>
                <option value="Hot">Hot</option> 
                <option value="Warm">Warm</option> 
                <option value="Cold">Cold</option>    
                 <option value="Not Interested">Not Interested</option>                     
            </select>
          </div>


          
        </div>
      </div>

       <div class="row mx-auto" style="height:20px;"></div>

       <div class="row">
          <div class="col-md-4 col-md-offset-1">
            <label for="Note">Notes</label>
              <textarea class="form-control" name="notes"></textarea>
          </div> 
   
         <div class="form-group"> 
            <div class="col-md-4 col-md-offset-1">
            <label for="PackageInterestedIn">Package Interested In</label>
            <select class="form-control" name="package">
        <option value="">-- Please Select Package --</option>
                @foreach($package as $pac)
                <option value="{{$pac->schemename}}">{{$pac->schemename}}</option>
                @endforeach
                                     
            </select>
          </div> 
        </div>
       </div>

      <div class="row"  style="height: 30px;"></div>

      <div class="row">

        <div class="col-md-6">
          <div class="row"> 
          <div class="form-group">
            <div class="col-md-12">
              <h4><b>Schedule Reminder (Optional)</b></h4>
            </div>
          </div>
       </div>

       <div class="row"> 
          <div class="form-group">
            <div class="col-md-6 col-md-offset-2">
              <label for="PackageInterestedIn">Schedule Next Call Date</label>
                 <label for="CallDuration">Date</label>
                 <input  type="text" id="scheduledate" class="form-control" name="scheduledate" placeholder="<?php echo date("d-m-Y"); ?>" value="" >
            </div>
          </div>
       </div>

       <div class="row"  style="height: 10px;"></div>

       <div class="row"> 
          <div class="form-group">
            <div class="col-md-6 col-md-offset-2">
             <label for="PackageInterestedIn">Assign To</label>
              <select class="form-control" name="assign">
                  <option value="Vicky Shah">Vicky Shah</option>                      
              </select>
            </div>
          </div>
       </div>

         <div class="row"> 
          <div class="form-group">
            <div class="col-md-3 col-md-offset-1">
              
            </div>
             <div class="col-md-3">
              
            </div>
          </div>
        </div>
        </div>

        <div class="col-md-6">
                <div class="row"> 
              <div class="form-group">
                <div class="col-md-12">
                  <h4><b>Free Trial Details(Optional)</b></h4>
                </div>
              </div>
            </div>

              <div class="row">

              <div class="form-group">
                <div class="col-md-6">
                  <label for="PackageInterestedIn">Trainer</label>
                  <select class="form-control" name="trainer">
                      <option value="Trainer 1">Trainer 1</option>                      
                  </select>
                </div>

                <div class="col-md-6">
                   <label for="FreeTrialOn">Free Trial On</label>
                      <input  type="text" id="freetrialdate" class="form-control" name="freetrialdate" placeholder="<?php echo date("d-m-Y"); ?>" value=""> 
                </div>
              </div>
            </div>
           
            <div class="row"  style="height: 20px;"></div>

              <div class="row"> 
              <div class="form-group">
                <div class="col-md-12">
                  <label for="PackageInterestedIn">Free Trial Package</label>
                  <select class="form-control" name="ftp">
                      @foreach($package as $pac)
                      <option value="{{$pac->schemename}}">{{$pac->schemename}}</option>
                      @endforeach                     
                  </select>
                </div>
              </div>
            </div>
        </div>
      </div>

    <div class="row"  style="height: 20px;"></div>
   

    <div class="modal-footer">
      <div class="form-group">

        <div class="col-md-2 col-md-offset-8"> <a href="{{url('inquiry')}}" class="btn btn-danger btn-block">Cancel</a>
         </div>
               
         <div class="col-md-2">
         <button type="submit" class="btn btn-info btn-block">
         Save</button>
       </div>   
      
     
      </div>
    </div>

    <div class="row"  style="height: 20px;"></div>

    </form>
  </div>

</div>

 <script language="javascript">
        $(document).ready(function () {
            

             $("#scheduledate").datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd',
            });

            $("#freetrialdate").datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd',
            });
        });
    </script>

<script>
$(document).ready(function() {


    $('#datePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
        }); 
         $('#datePicker2')
        .datepicker({
            format: 'dd/mm/yyyy'
        });
        $('#datePicker3')
        .datepicker({
            format: 'dd/mm/yyyy'
        });  
    });    
</script>

<script>


// Get the modal
var modal = document.getElementById("myModal");
 modal.style.display = "block";



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script type="text/javascript">
window.onkeyup = function(e) {
   var event = e.which || e.keyCode || 0; // .which with fallback

   if (event == 27) { // ESC Key
       window.location.href = '{{url("inquiry")}}'; // Navigate to URL
   }
}
</script>
@endsection