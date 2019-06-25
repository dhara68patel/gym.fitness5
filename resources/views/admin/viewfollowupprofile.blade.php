@extends('layouts.adminLayout.admin_design_without_footer')
@section('content')

<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

        <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" /> -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/js/cdnjs1.3.0/datepicker.min.css" />
          <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" /> -->
          <link rel="stylesheet" href="../../bower_components/bootstrap/js/cdnjs1.3.0/datepicker3.min.css" />
         
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script> -->
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




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <a href="{{url('inquiry')}}"><span class="close">&times;</span></a>
    <h2><b>Followup Profile</b></h2>
    </div>
    <div class="modal-body">

     <!--  <h2 class="page-header">AdminLTE Custom Tabs</h2> -->

      <!-- <div class="row">
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <!-- <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
            
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
         
            </div>
          
          </div>
          
        </div> -->

        <div class="">
    <!-- Content Header (Page header) -->
    <section class="">
      <h3><b> User Followup Profile</b>
      </h3>    
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/lman.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{$info->firstname}} &nbsp; {{$info->lastname}}</h3>

              <p class="text-muted text-center">Mo : {{$info->mobileno}}</p> 

              
            </div>
      
          </div>
      
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#PackagesInterested" data-toggle="tab">Packages Interested</a></li>
              <li><a href="#Logs" data-toggle="tab">Logs</a></li>   <!-- timeline -->
              <li><a href="#CallLogs" data-toggle="tab">Call Logs</a></li>
              <li><a href="#Info" data-toggle="tab">Info</a></li>
              <li><a href="#Notes" data-toggle="tab">Notes</a></li>
              <li><a href="#Reminders" data-toggle="tab">Reminders</a></li>
             
              <li><a href="#Free" data-toggle="tab">Free Trials</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="PackagesInterested">
                <!-- Post -->
                <div class="card">
                  <div class="card-body">

                    <div class="row mx-auto" style="height:30px;"></div>

                    <div class="row"> 
                          <div class="col-md-4">
                            @if(!$package) <label> No Followup Details Found !</label> @endif      
                          </div>
                      </div>
                       @if($package)
                      <div class="row"> 
                          <div class="col-md-8">    
                            <label>Package Name : </label> &nbsp;&nbsp; {{$package->schemename}} 
                          </div>
                      </div>

                      <div class="row mx-auto" style="height:20px;"></div>

                      <div class="row"> 
                          <div class="col-md-4">
                            <label>Actual Price : </label> &nbsp;&nbsp; @if($package) Rs. {{$package->actualprice}}@endif
                          </div>
                      </div>
                      @endif
                  </div>
                </div>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Logs">
                <!-- The timeline -->

                @foreach($followup_call_details as $log)
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                         {{date('j F, Y', strtotime($log->created_at))}}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <!-- <i class="fa fa-dot-circle-o bg-blue"></i> -->

                    <div class="timeline-item">
                      <span class="time"><!-- <i class="fa fa-clock-o"></i> --> {{$log->callrating}}</span>

                      <h3 class="timeline-header"><a>Followup By :</a> &nbsp;<b> {{$log->callcompletedby}}</b></h3>

                      <div class="timeline-body">
                        {{$log->callnotes}} 
                      </div>
                      <!-- <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div> -->
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
              <!--     <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <!-- <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li> -->
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li> -->
                </ul>
                @endforeach
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="CallLogs">
                @foreach($followup_call_details as $CallLogs)
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                         {{date('j F, Y', strtotime($CallLogs->created_at))}}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <!-- <i class="fa fa-dot-circle-o bg-blue"></i> -->

                    <div class="timeline-item">
                      <span class="time"><!-- <i class="fa fa-clock-o"></i> --> {{$CallLogs->callrating}}</span>

                      <h3 class="timeline-header"><a>Completed By :</a>&nbsp;<b>{{$CallLogs->callcompletedby}}</b></h3>

                      <div class="timeline-body">
                        <label>Call Response :</label> <b>{{$CallLogs->callresponse}}</b>
                        <br/><br/>
                        <label>Call Duration : </label> <b>{{$CallLogs->callduration}}</b>
                      </div>


                      <!-- <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div> -->
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
              <!--     <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <!-- <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li> -->
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li> -->
                </ul>
                @endforeach
              </div>
    

              <div class="tab-pane" id="Info">

                <div class="row">
                  <div class="timeline-body">

                    <div class="col-md-2">
                    First Name :  
                    </div>

                    <div class="col-md-8">
                    {{$info->firstname}}     
                    </div>

                  </div>
              </div>

              <br/>
                
                <div class="row">
                  <div class="timeline-body">

                    <div class="col-md-2">
                    Last Name :
                    </div>

                    <div class="col-md-8">
                     {{$info->lastname}}
                    </div>

                  </div>
                </div>
                    
                <br/>

                  <div class="row">
                  <div class="timeline-body">
                    <div class="col-md-2">Gender : </div> 
                     <div class="col-md-8">{{$info->gender}}</div>     
                  </div>
                </div>

                  <br/>

                  <div class="row">
                  <div class="timeline-body">
                    <div class="col-md-2">Phone No :  </div>  <div class="col-md-8">{{$info->mobileno}}</div>     
                  </div>
                </div>

                  <br/>

                  <div class="row">
                  <div class="timeline-body">
                    <div class="col-md-2">Profession : </div>  <div class="col-md-8">{{$info->profession}}</div>
                  </div>
                  </div>
                  <br/>
               
              </div>

              <div class="tab-pane" id="Notes">
                @if($callnotes->callnotes)
                @foreach($followup_call_details as $Notes)
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                         {{date('j F, Y', strtotime($Notes->created_at))}}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <!-- <i class="fa fa-dot-circle-o bg-blue"></i> -->

                    <div class="timeline-item">
                      <span class="time"><!-- <i class="fa fa-clock-o"></i> --> {{$Notes->callrating}}</span>

                      <div class="timeline-body">
                        <p>{{$Notes->callnotes}}</p>
                      </div>
                    </div>
                  </li>
                  
                </ul>
                @endforeach
                @else
                  <div class="timeline-body">
                        <label> No Call Notes Added !</label>
                      </div>
                @endif
              </div>

              <div class="tab-pane" id="Reminders">
                @if($schedule->schedulenextcalldate)
                @foreach($followup_call_details as $Reminders)               
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                         {{date('j F, Y', strtotime($Reminders->calldate))}}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <!-- <i class="fa fa-dot-circle-o bg-blue"></i> -->

                    <div class="timeline-item">
                      <span class="time"><!-- <i class="fa fa-clock-o"></i> --> <!-- {{$Reminders->callrating}} --></span>

                      <div class="timeline-body">
                        <label> Schedule Next Call Date : </label> <b>{{$Reminders->schedulenextcalldate}}</b><br/><br/>
                        <label> Schedule Assign To : </label> <b>{{$Reminders->scheduleassign}}</b> 
                      </div>
                    </div>
                  </li>
                  
                </ul>                               
                @endforeach
                @else
                    <div class="timeline-body">   
                        <label> No Schedule Found !</label>  
                      </div>
                @endif
              </div>

              
              <div class="tab-pane" id="Free">


                @if($freetiral->freetrialpackage && $freetiral->trainer && $freetiral->freetrial)
                  <div class="timeline-body">                       
                        <label> Trainer Name Is : </label> <b>{{$freetiral->trainer}} </b><br/><br/>
                        <label> Free Trial On : </label> <b>{{date('j F, Y', strtotime($freetiral->freetrial))}}</b><br/><br/>
                        <label> Free Trial Package : </label> <b>{{$freetiral->freetrialpackage}}</b>
                  </div>
                  @else
                    <div class="timeline-body">                       
                        <label>No Free Trial Details Found ! </label>
                  </div>
                  @endif
               
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

     </div> 

</div>


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