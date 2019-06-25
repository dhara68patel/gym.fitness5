  @extends('layouts.adminLayout.admin_design')
@section('content')
<!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<script src="../../bower_components/datatables.net/js/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.responsive.js"></script>

<style type="text/css">
  .rating {
    float:left;
}
.table-bordered {
    border: 1px solid #f4f4f4;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

/* end of Lea's code */

/*
 * Clearfix from html5 boilerplate
 */

.clearfix:before,
.clearfix:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.clearfix:after {
    clear: both;
}

/*
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */

.clearfix {
    *zoom: 1;
}
.Add{
  color: #32BE24;
}
.call{
  color: #7758EE;
}
  .btn span.fa-check {              
    opacity: 0;             
}
.btn.active span.fa-check {             
    opacity: 1;             
}
.btn-app{
  width: 130px;
  height: 100px;
  padding: 29px 8px;
}



/* my stuff */
/*#status, button {
    margin: 20px 0;
}*/
</style>
  <div class="content-wrapper">
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
     
         <section class="content-header"><h2>All Inquiry</h2></section>
          <!-- general form elements -->
        <br>

<div class="container-fluid">
  <form class="form-inline" method="post" action="{{ url('inquiry') }}">
     {{ csrf_field() }}

    <div class="form-group">

    <label for="user" class="sr-only">User Name</label>
    <select data-width="180px" name="firstname" class="form-control" id="username">
      <option value="" selected disabled>Select First Name</option>
      <option value="" >All</option>
      @foreach($users as $user)
        <option value="{{ $user->inquiriesid }}">{{ $user->firstname }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="partyid" class="sr-only">Mobile No.</label>
    <select data-width="180px" name="mobileno" class="form-control" id="mobileno">
      <option value="" selected disabled>Select Mobile No.</option>
      <option value="" >All</option>
       @foreach($users as $user)
        <option value="{{ $user->inquiriesid }}">{{ $user->mobileno }}</option>
      @endforeach
    </select>
  </div>

    <div class="form-group">
                 
                 <select  class="form-control" name="HearAbout"><option disabled="" selected>How did you hear about us ?</option>
                   <option value="Fitness Five Member">Fitness Five Member</option>
                     <option value="We Called Them">We Called Them</option>
                       <option value="Friends/Family">Friends/Family</option>
                         <option value="Via Internet">Via Internet</option>
                           <option value="Word Of Mouth">Word Of Mouth</option>
                           <option value="Radio Advertise">Radio Advertise</option>
                           <option value="Magazine Advertise">Magazine Advertise</option>
                             <option value="Other">Other</option>
                 </select>
                </div>
   <div class="form-group">
    <label class="sr-only" for="search">Any Keyword</label>
    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Any Keyword">
  </div>
  <br>
  <div class="form-group">
    <label>Inquiry Date</label>
    <div class="input-group date" style="max-width:180px" id="startdate">
      <input type="date" class="form-control" name="inquirydate" placeholder="Inquiry Date"/></div>
    
 
    </div>
  
     <div class="form-group">
    <label>Follow Up Date</label>
    <div class="input-group date" style="max-width:180px" id="enddate">
      <input type="date" class="form-control" name="followupdate" placeholder="To Date" />
      
    </div>
  </div>
   <div class="form-group">
    <button name="submit" type="submit" class="btn bg-orange margin">Search</button><a href="{{ url('inquiry') }}" class="btn bg-red">Clear</a>
  </div>
      <!-- <div class="form-group">&nbsp;
   <label>Rating</label>

<div id="ratingForm">   
    <fieldset class="rating">
   

        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
    </fieldset>
    <div class="clearfix"></div>

</div>
</div> -->

 

</form>

  <hr> 
  @if ($message = Session::get('message'))
    @if($message=="Succesfully added")
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message=="Inquiry Already Exists")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
@endif 
<div class="table-wrapper">
  <div class="table-title">

       <div class="box container-fluid">
    <div class="box-header">
      <a href="{{ url('addinquiry') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i> Add New</a>
      <a href="{{ url('viewconfirmedinquiry') }}" class="btn add-new bg-navy"><i class="fa fa-eye"></i> View Confirmed Inquiry</a>
    <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
                        <!-- <th>Created Date</th> -->
                        <th>Inquiry Date</th>
                        <th>Name</th>
                        <th>Quality</th>
                        <th>Type</th>
                        <th>Poc</th>
                        <th>Mobile No</th> 
                       <!--  <th>Last Call</th> -->
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                  @if($members!="")
                  <?php $i=0; ?> 
                 @foreach($members as $member)
                    <tr>
                      

                        
                        <td>{{ date('j F, Y', strtotime($member->createddate))}}</td>
                        <td>{{$member->firstname}} &nbsp; {{ $member->lastname }} 
                          <span class="pull-right">
                                @if($member->gender == 'male')
                                  <i class="fa fa-male text-info" style="font-size: 18px;"></i>
                                @else
                                  <i class="fa fa-female text-success" style="font-size: 18px;"></i>
                                @endif
                            </span>
                         </td>
                        <td> {{ $member->rating }} </td>
                        <td> {{ $member->inquirytype }}</td>
                        <td> {{ $member->poc }}</td>
                        <td> {{ $member->mobileno }}</td>
                        <!-- <td> {{$member->calldate}}</td> -->

                       
                       
                      
                        <td>
                         <!-- @if($member->calldate == '')
                           <a href="#"class="Add" title="View Inquiry Profile" id="viewfollowupprofile{{$i}}"><i class="fa fa-eye"></i></a>
                           @else -->
                           <a href="{{url('viewfollowupprofile/'.$member->inquiriesid)}}"class="Add" title="View Inquiry Profile" id="viewfollowupprofile{{$i}}"><i class="fa fa-eye"></i></a>
                          <!-- @endif                            -->
                           <a href="{{ url('viewfollowup/'.$member->inquiriesid) }}"class="call" id="addfollowup{{$i}}" title="Add Followup" onclick="call()"><i class="fa fa-phone"></i></a>

                            <a href="{{ url('editinquiry/'.$member->inquiriesid) }}"class="btn-xs edit" id="editinquiry" title="Edit Inquiry"><i class="fa fa-edit"></i></a>
<!-- 
                            <a href="{{ url('confirminquiry/'.$member->inquiriesid) }}"class="btn-xs check" title="Confirm Inquiry"><i class="fa fa-users"></i></a> -->  

                            <a type="button" class=""   data-toggle="modal" data-target="#modal-default"  onclick="asd('{{$member->mobileno}}')" title="Notification"><i class="fa fa-bell" aria-hidden="true"></i>
                              <input type="hidden" name="notification"  value="{{$member->mobileno}}" id="notofication" >
                            </a>

                             <script type="text/javascript">
                               $(document).ready(function(){
                                        var mobileno = "{{$member->mobileno}}";
                                        var inquiriesid = "{{$member->inquiriesid}}";
                                        // alert(mobileno);

                                          $.ajax({  
                                 
                                 type:"GET",  
                                data: {"_token": "{{ csrf_token() }}","notificationid": mobileno},
                                url:'{{ URL::route("getnotification") }}', 
                                async:false,  
                                 success:function(data){
                                      
                                      $.each(data,function(i,item){
                                        // alert(item.call);
                                        if (item.call== 0) 
                                        {

                                          $('#addfollowup{{$i}}').attr('href','#');

                                          $('#addfollowup{{$i}}').click(function(){
                                            alert("Please Turn On DND Option !");
                                           });                           
                                        }
                                      });                         
                                 },
                                 dataType:'json',
                            });
                          });
                       </script>

                            <div class="modal fade" id="modal-default">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Notification</h4>
                                          </div>
                                          <div class="modal-body">
                                            <div class="box-body">
                                              <p>Select The Notification With convenience via SMS / Email / Call ! </p>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <input type="checkbox" name="" class="" value="1" id="smscheck">
                                                <a class="btn btn-app" id="smslinkcheck" onclick="smscheck();"> 
                                                <i class="fa fa-comment"></i><br/>SMS
                                              </a>       
                                            </div>
                                              <div class="col-md-4">
                                                <input type="checkbox" name=""  class="" value="1" id="emailcheck">
                                                <a class="btn btn-app" id="emaillinkcheck" onclick="emailcheck();">
                                                <i class="fa fa-envelope"></i><br/>Email
                                              </a>
                                              </div>
                                              <div class="col-md-4">
                                                <input type="checkbox" name="" class="" value="1" id="callcheck">
                                                <a class="btn btn-app" id="calllinkcheck" onclick="callcheck();">
                                                <i class="fa fa-phone"></i><br/>Call
                                              </a>
                                              </div>                                              
                                              </div> 
                                             
                                           
                                          </div>
                                          <div class="modal-footer">
                                           <!--  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                                     
                                            <button id="notify" class="btn bg-navy" onclick="ss()"
                                            data-dismiss="modal">Save</button>

                                           </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                     
                                      <!-- /.modal-dialog -->
                                      
                                    </div>


                             <a href="{{ url('closeinquiry/'.$member->inquiriesid) }}"class="btn-xs delete" title="Close Inquiry"><i class="fa fa-times"></i></a>

                                     <!-- Button trigger modal -->
                             
                            
                        </td>
                        
                    </tr>
                    <?php $i++; ?>
              @endforeach
              @endif
             
              
 
            </tbody>
            </table>
<!-- /.box-body -->
</div>
        </div>
 
      
   
    </div>

    </div>
  </div>

</div></div>
<script type="text/javascript">
   function asd(mid){

             $('#notofication').val(mid);

            var notificationid =  $('#notofication').val();

             $.ajax({  
                     
                     type:"GET",  
                    data: {"_token": "{{ csrf_token() }}","notificationid": notificationid},
                    url:'{{ URL::route("getnotification") }}', 
                    async:false,  
                     success:function(data){
                          // alert(data); 
                          $.each(data,function(i,item){
                            // alert(item.sms);
                            if (item.sms==1) 
                            {
                              $('#smscheck').attr('checked',true);                           
                            }
                            if (item.email==1) 
                            {
                              $('#emailcheck').attr('checked',true);                           
                            }
                            if (item.call==1) 
                            {
                              $('#callcheck').attr('checked',true);                           
                            }
                          });                         
                     },
                     dataType:'json',
                }); 

            // console.log(notificationid);

          }

</script>

 <script type="text/javascript">

                  function ss(){

             var ss=$('#notofication').val();

             if ($('#smscheck').is(':checked')) 
             {
              
              var smsck=$('#smscheck').val();
             }
             else
            {
                var smsck=0;

            }
            if ($('#emailcheck').is(':checked')) 
             {
             
              var emailck=$('#emailcheck').val();
            
             
             }
             else
            {
                var emailck=0;    
            }
              if ($('#callcheck').is(':checked')) 
             {
             
              var callck=$('#callcheck').val();
              location.reload();
            
             
             }
             else
            {
                var callck=0;
                location.reload();    
            }




               $.ajax({  
                     
                     type:"POST",  
                    data: {"_token": "{{ csrf_token() }}","mobileno": ss,"sms":smsck,"mail":emailck,"call":callck,},
                    url:'{{ URL::route("notificationstatus") }}',   
                     success:function(data){
                          
                          
                     }  
                }); 
  
                }
                </script>




 <script type="text/javascript">
    function sms(){

             if($('#sms').is(":checked")){

             var sms = $('#sms').val();
           
           }
              }

          function smscheck(){
            
            $('#smscheck').trigger('click');



            $('#asd').click(function(){
          
           var sms = $('#smscheck').val();   

               
                

        }); 
            
          }

           function emailcheck(){
 
            $('#emailcheck').trigger('click');
          }


           function callcheck(){
           
                      $('#callcheck').trigger('click');
                    }
                           
</script>

    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    })
  })
</script>

<script type="text/javascript">
  $('#example1').DataTable({
       stateSave: false,
       paging:  true,
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
   });
</script>

<script type="text/javascript">


   $(document).ready(function() {
    $('#inquirydata').DataTable( {
        "scrollX": true
    } );



    $("#ratingForm").change(function(e) 
    {
        e.preventDefault(); // prevent the default click action from being performed
        if ($("#ratingForm :radio:checked").length == 0) {
            $('#status').html("nothing checked");
            return false;
        } else {
          
            $('#status').html( 'You Rated ' + $('input:radio[name=rating]:checked').val() );
        }
    });
});
</script>
<script type="text/javascript">
  $(function () {
    $('.date').datetimepicker({format: 'DD/MM/YYYY',useCurrent: 'day'});
  });
</script>
<script type="text/javascript">
    $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
@endsection