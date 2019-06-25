@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')

  <link rel="stylesheet" href="../../bower_components/bootstrap/js/cdnjs1.3.0/datepicker.min.css" />
    <!--  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" /> -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/js/cdnjs1.3.0/datepicker3.min.css" />
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script> -->
    <script src="../../bower_components/bootstrap/js/cdnjs1.3.0/bootstrap-datepicker.min.js"></script>

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
 
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <a href="{{url('inquiry')}}"><span class="close">&times;</span></a>

        <h5><b>Edit Followup Details</b></h5>

         <h3 class="text-uppercase"><b> {{$followupid->firstname}} &nbsp;{{$followupid->lastname}}</b><b>&nbsp;#+91&nbsp;{{$followupid->mobileno}}</b> <span class="pull-right text-uppercase"><b> Date : {{$followupid->createddate}} </b></span></h3>
      
     
    </div>
    <div class="modal-body">
      <form role="form" action="{{ url('editfollowupmodel/'.$followupid->followupid) }}" method="POST" >
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
            @foreach($fcd as $f)
            <label for="CallResponse">Call Response</label>
             <select class="form-control" id="exampleFormControlSelect1" name="callresponse">
                <option value="{{$f->callresponse}}">{{$f->callresponse}}</option>
                <option value="Can't_Pick_up_Your_Call">Can't Pick up Your Call</option> 
                <option value="Asked_To_Call_Later">Asked To Call Later</option> 
                <option value="Interested_To_Visit_GYM">Interested To Visit GYM</option> 
                <option value="Not_Interested_In_GYM">Not Interested In GYM</option> 
                <option value="Other">Other</option>      
            </select>
            @endforeach
          </div>
                 
                <div class="col-md-6">                   
                      <input  type="hidden" id="calldate" class="form-control" name="calldate" value="<?php echo date("Y-m-d"); ?>"> 
                </div>
       
          <div class="col-md-2">
            @foreach($fcd as $f)
            <label for="CallDuration">Call Duration</label>
             <select class="form-control" id="exampleFormControlSelect1" name="callduration">
                <option value="{{$f->callduration}}">{{$f->callduration}}</option>
                <option value="0-30 sec">0-30 sec</option>
                <option value="30-60 sec">30-60 sec</option> 
                <option value="60-90 sec">60-90 sec</option> 
                <option value="Above 90 sec">Above 90 sec</option>
              @endforeach                     
            </select>
          </div>

          <div class="col-md-3">
            @foreach($fcd as $f)
            <label for="CallQulity">Call Rating</label>
            <select class="form-control" id="exampleFormControlSelect1" name="callqulity">
              <option value="{{$f->callrating}}">{{$f->callrating}}</option>
                <option value="Super Hot">Super Hot</option>
                <option value="Hot">Hot</option> 
                <option value="Warm">Warm</option> 
                <option value="Cold">Cold</option>    
                 <option value="Not Interested">Not Interested</option>                     
            </select>
             @endforeach
          </div>


          
        </div>
      </div>

       <div class="row mx-auto" style="height:20px;"></div>

       <div class="row">
        @foreach($fcd as $f)
          <div class="col-md-4 col-md-offset-1">
            <label for="Note">Notes</label>
              <textarea class="form-control" name="notes">{{$f->callnotes}}</textarea>
          </div> 
        @endforeach
         <div class="form-group"> 
            <div class="col-md-4 col-md-offset-1">
            <label for="PackageInterestedIn">Package Interested In</label>
            <select class="form-control" name="package">
                @foreach($package as $pac)
                <option value="{{$pac->schemeid}}">{{$pac->schemename}}</option>
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
              @foreach($fcd as $f)
              <label for="PackageInterestedIn">Schedule Next Call Date</label>
                 <label for="CallDuration">Date</label>
                 <input  type="text" id="scheduledate" class="form-control" name="scheduledate" value="{{$f->schedulenextcalldate}}">
                 @endforeach
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
                  @foreach($fcd as $f)
                  <label for="PackageInterestedIn">Trainer</label>
                  <select class="form-control" name="trainer">
                    <option value="{{$f->trainer}}">{{$f->trainer}}</option>
                      <option value="Trainer 1">Trainer 1</option>                      
                  </select>
                  @endforeach
                </div>

                <div class="col-md-6">
                   @foreach($fcd as $f)
                   <label for="FreeTrialOn">Free Trial On</label>
                      <input  type="text" id="freetrialdate" class="form-control" name="freetrialdate" value="{{$f->freetrial}}">
                   @endforeach
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

        <div class="col-md-2 col-md-offset-8"> <a href="{{url('followup')}}" class="btn btn-danger btn-block">Cancel</a>
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
                dateFormat: 'dd-mm-yy',
            });

            $("#freetrialdate").datepicker({
                minDate: 0,
                dateFormat: 'dd-mm-yy',
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
       window.location.href = '{{url("followup")}}'; // Navigate to URL
   }
}
</script>
@endsection