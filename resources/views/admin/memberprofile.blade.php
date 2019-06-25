  @extends('layouts.adminLayout.admin_design_without_footer')
@section('content')



<style type="text/css">
  .accordion-container .article-title {
    display: block;
    position: relative;
    margin: 0;
    padding: 0.625em 0.625em 0.625em 2em;
    border-top: 1px solid #ff851b;
    font-size: 1.20em;
    font-weight: bold;
    font-weight: normal;
    color: #444C3A;
    cursor: pointer;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}
.box {
    border-top-color: #f39c12;
}
.box-primary {
    border-top-color: #f39c12;
}
.active {
  border-bottom: 2px solid #ecf0f1;
  text-decoration: none;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.accordion-container .article-title:hover,
.accordion-container .article-title:notActive,
.accordion-container .content-entry.open .article-title {
    background-color: #82C030;
    color: white;
}

.accordion-container .article-title:hover i:before,
.accordion-container .article-title:hover i:notActive,
.accordion-container .content-entry.open i {
    color: white;
}

.accordion-container .content-entry i {
    position: absolute;
    top: 3px;
    left: 12px;
    font-style: normal;
    font-size: 1.625em;
    sans-serif;
    color: #ff851b;
}

.accordion-container .content-entry i:before {
    content: "+ ";
}

.accordion-container .content-entry.open i:before {
    content: "- ";
}

.accordion-content {
    display: none;
    padding-left: 2.3125em;
}
/* This stuff is just for the Codepen demo */

#content {
    width: 100%;
}

.accordion-container,
#description {
    width: 90%;
    margin: 1.875em auto;
}

@media all and (min-width: 860px) {
    #content {
        width: 70%;
        margin: 0 auto;
    }
}

.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
  width: 27px;


}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    
    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
     Taking the difference out of the padding 
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
  text-indent: 0;
}
.btn-success{

  background-color: #82C030;
  border-color: #82C030;
}

.btn-success:hover{

  background-color: #83C530;
  border-color: #83C530;
}

#radioBtn .notActive{
    color: #000000;
    background-color: #fff;
}

.check
{
    opacity:0.5;
  color:#996;
}
.box{
    margin-bottom:5px;
}
</style>
<script type="text/javascript">
$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        var links = this.el.find('.article-title');
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.accordion-content').not($next).slideUp().parent().removeClass('open');
        };
    }
    var accordion = new Accordion($('.accordion-container'), false);
});

  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('notActive').addClass('notnotActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notnotActive').addClass('notActive');
});

</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="../../bower_components/jquery/src/ajax/jquery.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-decoration: none">
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="content">
          @if ($errors->any())
            <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
        @if ($message = Session::get('message'))
@if($message)
      <div class="alert alert-danger alert-block" id="ak">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
      <script type="text/javascript">
          $(document).ready (function(){
           $('#pkgd').trigger('click');
            });
      </script>
    @endif
    @endif
    <script type="text/javascript">
  $(document).ready (function(){

                $("#ak").fadeTo(15000, 1000).slideUp(1000, function(){
               $("#ak").slideUp(10000);

                });   
 });
</script>
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style="height: 100px;" <?php if ($member->photo): ?>
                src="/files/{{$member->photo}}"
              <?php else: ?>
                 src="/files/default.png"
              <?php endif ?>  alt="User profile picture">

              <h3 class="profile-username text-center">{{$member->firstname}} {{$member->lastname}}</h3>

              <p class="text-muted text-center">{{$member->profession}}</p>
              <br/>
              <!-- <ul class="list-group list-group-unbordered"> -->
                <div class="nav-tabs-custom">
            <ul class="">
                <li class="list-group-item">
                  <button type="button" id="package"><b style="text-decoration: none">Packages</b></button><p class="pull-right">{{count($packages)}}</p>
                </li>
                <li class="list-group-item">
                  <b>Notes</b> <a class="pull-right" style="color: black">{{count($notes)}}</a>
                </li>

                <!-- <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li> -->
              </ul>
              </div>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <script type="text/javascript">
            $('#package').on('click',function(){
              // alert("dd");
              $('#pkgd').trigger('click');
            });
          </script>
          <!-- /.box -->

          <!-- About Me Box -->
        
          <!-- /.box -->
          <br>
             <!-- ********************for create note**************************-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add Note</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name"readonly="" value="{{$member->username}}">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Note:</label>
                    <textarea class="form-control" id="notes"></textarea>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
             
              <button type="button" class="btn bg-orange" id="savenotes">Save</button>
               <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
         <!-- ********************for edit note**************************-->
           <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Note</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name" readonly="" value="{{$member->username}}">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Note:</label>
                    <textarea class="form-control" id="notesdetails"></textarea>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
             
              <button type="button" class="btn bg-orange" id="updatenote">Update</button>
               <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
         <!-- ********************for view note**************************-->
          <div class="modal fade" id="exampleModalview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><b>View Note</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name"  readonly=""value="{{$member->username}}">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Note:</label>
                    <textarea class="form-control" id="notedetail"></textarea>
                  </div>
                  <div>
                   @foreach($notes as $note)
                   @if($note->images)

                   @php 
                     $noteimages =  json_decode($note->images); @endphp
                   @foreach($noteimages as $imgs)

                   <a href="/files/{{$imgs}}" target="_blank"><img src="/files/{{$imgs}}"  alt="Image Alternative text" title="{{$imgs}}" height="100px" /></a>
                  @endforeach
                   @endif
                   @endforeach
                  </div>
                </form>
            </div>
            <div class="modal-footer">
             <!-- <button type="button" class="btn bg-orange" id="uploadimage">Upload</button> -->
               <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ********************for image upload**************************-->
      <div class="modal fade" id="exampleModalimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><b>Image Note</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form method="post" enctype="multipart/form-data" action="{{ route('imageupload') }}">
                    {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name" name="user" value="{{$member->username}}">
                    <input type="hidden" name="note" value="" id="noteid">
                  </div>
                  <div class="form-group">
                    <label for="images" class="col-form-label">Image Upload:</label>
                    <input type="file" name="image_upload[]"  enctype="multipart/form-data" id="image-upload"  multiple/>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn bg-orange" name="imageupload" id="imageupload">Upload</button>
               <button type="button" class="btn bg-red" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
         <!-- ********************for**************************-->
          <div  id="notesall">
          <div class="box box-primary">
            <div class="box-body content-fit-box">
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> + Add Notes</button>
            </div>
          </div>
           <?php 
                $i=0;
                 ?>
             @if($notes)
          <div class="box box-primary">
           @foreach($notes as $key =>$note)
        
      <div class="box-body content-fit-box">
               {{ substr($note->notes, 0, 18) }}{{'...'}} &emsp;<br/> <br>
               <button type="button" class="btn bg-orange editnote" id="editnote" 
               data-toggle="modal" data-target="#exampleModaledit" value="{{$note->notesid}}"
                onclick="datadisplay('<?php echo $note->notesid; ?>')"><i class="fa fa-edit"></i></button>
   
              <button type="button" class="btn bg-red" data-toggle="modal" value="{{$note->notesid}}" id="notedelete{{<?php echo $i; ?>}}"><i class="fa fa-trash"></i></button>

              <button type="button" class="btn bg-navy" id="viewnote" data-toggle="modal" data-target="#exampleModalview" value="{{$note->notes}}"  
                onclick="datadisplay('<?php echo $note->notesid; ?>')"><i class="fa fa-eye"></i></button>

                <input type="hidden" name="imgnote{{$i}}" id="imgnote{{$i}}" value="{{$note->notesid}}">

                <button type="button" class="btn bg-navy" id="imagenote{{$i}}" onclick="imagenote('{{$note->notesid}}')" data-toggle="modal" data-target="#exampleModalimage" ><i class="fa fa-image"></i></button>
                </div>
                <?php $i++ ?>
           @endforeach
          
          </div>
           @endif
        </div>
      </div>
        <script type="text/javascript">
           var gb='';
             function fun(f){
            gb=f;
          }

          function datadisplay(y){
          
              
            fun(y);
         var id=y;
        
             var _token = $('input[name="_token"]').val();
            if(id)
             {
             $.ajax({

                  url:"{{ route('viewnote') }}",
                  method:"POST",
                  data:{id:id, _token:_token},
                  success:function(result)
                  {
                    var data=result;
                 
                $('#notesdetails').text(data.notes);
              $('#notedetail').text(data.notes);
                   
                  },
                  dataType:"json"
                 })
            }

             
              

          }

      var i=<?php echo $i; ?>;

    function imagenote (e){
      var note = e;
   
      $('#noteid').val(note);
    }
          $('#savenotes').on('click',function(){
            var note=$('#notes').val();
            var user=$('#recipient-name').val();
             var _token = $('input[name="_token"]').val();
            if(note)
             {
             $.ajax({

                  url:"{{ route('addnote') }}",
                  method:"POST",
                  data:{note:note,user:user, _token:_token},
                  success:function(result)
                  {
                    var data=result;
                     $('#exampleModal').attr("style", "display:none").removeClass('in');
                     location.reload();
                   
                  },
                  dataType:"json"
                 })
            }

          });
         
        
           $(function() {
  $('#exampleModaledit').bind('show',function(){
    
      $("#notesdetails").val('bosta');
  });
});
       
            
          $('#updatenote').on('click',function(){

            var note=$('#notesdetails').val();
            var user=$('#recipient-name').val();
           
            
             var id = gb;
        
         
             var _token = $('input[name="_token"]').val();
            
            if(note)
             {
             $.ajax({

                  url:"{{ route('editnote') }}",
                  method:"POST",
                  data:{id:id,note:note,user:user, _token:_token},
                  success:function(result)
                  {
                    var data=result;
                     $('#exampleModaledit').attr("style", "display:none").removeClass('in');
                     location.reload();
                   
                  },
                  dataType:"json"
                 })
             location.reload();
            }

          });
      
           var i=<?php echo $i; ?>;
            for(n=0;n<i;n++){
           $('#notedelete'+n).on('click',function(){
            var note = $(this).val();
        
            var user=$('#recipient-name').val();
             var _token = $('input[name="_token"]').val();
          
            if(note)
             {
             $.ajax({

                  url:"{{ route('deletenote') }}",
                  method:"POST",
                  data:{note:note, _token:_token},
                  success:function(result)
                  {
                    var data=result;
                                   
                  },
                  dataType:"json"
                 })
             location.reload();
            }

          });
         }
        </script>

        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                 <a href="#timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#activity" data-toggle="tab">Personal Details</a></li>
              <li><a><button id="pkgd" data-target="#packagedetails"
data-toggle="tab">Package Details</button></a></li>
                <li><a href="#paymenthistory" data-toggle="tab">Payment History</a></li>
                  <li><a href="#Consent"data-toggle="tab">Consent Form</a></li>
             <!--       <li><a href="#notesall"data-toggle="tab">Notes</a></li> -->
            <!--   <li><a href="#consineform" data-toggle="tab">Consent Form</a></li> -->
              
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity">
                <!-- Post -->
                 <!-- <form action="{{ url('verify') }}" method="post" enctype="multipart/form-data" enctype="multipart/formdata">  {{ csrf_field() }} -->
    <div id="accordion" class="accordion-container box">
                 <article class="content-entry">
            <h4 class="article-title"><i></i>Registration Details</h4>
            <div class="accordion-content"><br/>

               <div class="well well-lg">
        
                  <form action="{{ url('editmember/'.$member->userid) }}" method="post" enctype="multipart/form-data"> 
                     {{ csrf_field() }}
                   <div class="form-group">
              <label>First Name</label>

             
                <input type="text"  name="firstname" id="firstname" class="form-control"placeholder="Firstname"  class="span11" required="" value="{{$member->firstname}}" />
              </div>
             <div class="form-group">
              <label>LastName</label>
             
                <input type="text"  name="lastname" id="lastname"class="form-control inline-block"placeholder="LastName"  class="span11" required="" value="{{$member->lastname}}" />
              </div>
              <div class="form-group">
              <label>User Name</label>
             
                <input type="text"  name="username" id="username" class="form-control"placeholder="User Name"  class="span11" required="" value="{{$member->username}}"/><span id="error_username"></span>
              </div>
                    <div class="form-group">  <label>Gender</label>
               
                    <label>
                      <input type="radio" name="gender"  value="Female" {{ $member->gender == "Female"? 'checked' :''}}>
                      Female
                    </label>
                
                    <label>
                      <input type="radio" name="gender"  value="Male" {{ $member->gender == "Male"? 'checked' :''}}>
                      Male
                    </label>
                  </div>
            <div class="form-group">
              <label>Email</label>
             
                <input type="email"  name="email" class="form-control"placeholder="Email Id"  class="span11"value="{{$member->email}}" />
              </div>
                <div class="form-group">
             <label>Cell Phone Number</label>
             
                <input type="text" value="{{$member->mobileno}}"name="CellPhoneNumber" id="MobileNo" minlength="10" maxlength="10"
        class="form-control number" placeholder="Mobile No" required=""  class="span11" /><span class="errmsg"></span>
               </div>
                  <div class="form-group">
             <label>Timing</label><br>
             <span><label>From</label></span>
<?php $date = date("H:i", strtotime($member->mworkinghourfrom));  ?>
             <select type="time"class="form-control" name="working_hour_from_1" id="fromtime">
              <option value="06:00" {{$date == '06:00' ? 'selected':''}}>06:00 AM</option>
              <option value="07:00" {{$date == '07:00' ? 'selected':''}}>07:00 AM</option>
              <option value="08:00" {{$date == '08:00' ? 'selected':''}}>08:00 AM</option>
              <option value="09:00" {{$date == '09:00' ? 'selected':''}}>09:00 AM</option>
              <option value="10:00" {{$date == '10:00' ? 'selected':''}}>10:00 AM</option>
              <option value="11:00" {{$date == '11:00' ? 'selected':''}}>11:00 AM</option>
              <option value="12:00" {{$date == '12:00' ? 'selected':''}}>12:00 AM</option>
              <option value="13:00" {{$date == '13:00' ? 'selected':''}}>01:00 PM</option>
              <option value="14:00" {{$date == '14:00' ? 'selected':''}}>02:00 PM</option>
              <option value="15:00" {{$date == '15:00' ? 'selected':''}}>03:00 PM</option>
              <option value="16:00" {{$date == '16:00' ? 'selected':''}}>04:00 PM</option>
              <option value="17:00" {{$date == '17:00' ? 'selected':''}}>05:00 PM</option>
              <option value="18:00" {{$date == '18:00' ? 'selected':''}}>06:00 PM</option>
              <option value="19:00" {{$date == '19:00' ? 'selected':''}}>07:00 PM</option>
              <option value="20:00" {{$date == '20:00' ? 'selected':''}}>08:00 PM</option>
              <option value="21:00" {{$date == '21:00' ? 'selected':''}}>09:00 PM</option>
              <option value="22:00" {{$date == '22:00' ? 'selected':''}}>10:00 PM</option></select>  
                  
             <label>To</label>
             <?php $date = date("H:i", strtotime($member->mworkinghourto));  ?>
                <select type="time"class="form-control" id="totime" name="working_hour_to_1">
              <option value="07:00" {{$date == '07:00' ? 'selected':''}}>07:00 AM</option>
              <option value="08:00"{{$date == '08:00' ? 'selected':''}}>08:00 AM</option>
              <option value="09:00"{{$date == '09:00' ? 'selected':''}}>09:00 AM</option>
              <option value="10:00"{{$date == '10:00' ? 'selected':''}}>10:00 AM</option>
              <option value="11:00" {{$date == '11:00' ? 'selected':''}}>11:00 AM</option>
              <option value="12:00"{{$date == '12:00' ? 'selected':''}}>12:00 AM</option>
              <option value="13:00"{{$date == '13:00' ? 'selected':''}}>01:00 PM</option>
              <option value="14:00"{{$date == '14:00' ? 'selected':''}}>02:00 PM</option>
              <option value="15:00"{{$date == '15:00' ? 'selected':''}}>03:00 PM</option>
              <option value="16:00"{{$date == '16:00' ? 'selected':''}}>04:00 PM</option>
              <option value="17:00"{{$date == '17:00' ? 'selected':''}}>05:00 PM</option>
              <option value="18:00"{{$date == '18:00' ? 'selected':''}}>06:00 PM</option>
              <option value="19:00"{{$date == '19:00' ? 'selected':''}}>07:00 PM</option>
              <option value="20:00" {{$date == '20:00' ? 'selected':''}}>08:00 PM</option>
              <option value="21:00" {{$date == '21:00' ? 'selected':''}}>09:00 PM</option>
              <option value="22:00" {{$date == '22:00' ? 'selected':''}}>10:00 PM</option>
              <option value="22:00" {{$date == '23:00' ? 'selected':''}}>11:00 PM</option>
            </select>  
          </div>

              </div>
            </div>


            <!--/.accordion-content-->
        </article>
         <article class="content-entry">
            <h4 class="article-title"><i></i>Contact Details</h4>
            <div class="accordion-content"><br/>
              <div class="well well-lg">

               <div class="form-group">
             <label>Address</label>
             
            <textarea rows="2" cols="20" name="Address" wrap="soft" class="form-control"  placeholder="Address" class="span11">{{$member->address}}</textarea>
               </div>
             <div class="form-group">
              <label>City</label>
             
                <input type="text"  name="City" class="form-control"placeholder="City"  value="{{$member->city}}" class="span11" />
              </div>
             <div class="form-group">
           
          
             <label>Home Phone Number</label>
             
                <input type="text" name="HomePhoneNumber" class="form-control number" id="HomePhoneNumber"placeholder="Home Phone Number"  minlength="10" maxlength="10" class="span11"  value="{{$member->homephonenumber}}" />
                <span class="errmsg"></span>
               </div>
           
                 
            
            <div class="form-group">
             <label>Office Phone Number</label>
             
                <input type="text" name="OfficePhoneNumber" class="form-control number" id="OfficePhoneNumber"placeholder="Office Phone Number"  minlength="10" maxlength="10" class="span11" value="{{$member->officephonenumber}}" />
                <span class="errmsg"></span>
               </div>
          
            <!--/.accordion-content-->
        </article>
          <article class="content-entry" >
            <h4 class="article-title"><i></i>Emergancy Contact Details </h4>
            <div class="accordion-content"><br/>
              <div class="well well-lg">
                
             <div class="form-group">
             <label>Emergancy Contact Name</label>
             
                <input type="text" name="emergancyname"  class="form-control" placeholder="EmergancyName"   class="span11" value="{{$member->emergancyname}}" />
               </div>
            
             <div class="form-group">
             <label>Emergancy Contact Relation</label>
             
                <input type="text" name="emergancyrelation" class="form-control" placeholder="EmergancyRelation"   class="span11" value="{{$member->emergancyrelation}}" />
               </div>
           
             <div class="form-group">
             <label>Emergancy Contact Address</label>
             
            <textarea rows="2" cols="20" name="emergancyaddress" wrap="soft" class="form-control"  placeholder="Emergancy Address" class="span11">{{$member->emergancyaddress}}</textarea>
               </div>
             <div class="form-group">
             <label>Emergancy Contact Number</label>
             
                <input type="text" name="EmergancyPhoneNumber" class="form-control number" id="EmergancyPhoneNumber"placeholder="EmergancyPhoneNumber"  minlength="10" maxlength="10" class="span11" value="{{$member->emergancyphonenumber}}" />&nbsp;<span class="errmsg"></span>
               </div>
      
        </div>
            <!--/.accordion-content-->
        </article>
        <script type="text/javascript">
       function   chekform(){
  var len = document.getElementById('MobileNo').value;
         
if(len.length < 10){
  alert ( "Please Enter valid Phone number" );
  return false; 
}
           var lenh = document.getElementById('HomePhoneNumber').value;
 if(lenh){
  if(lenh.length < 10){
  alert ( "Please Enter valid Home Phone Number" );
  return false; 
}
 }

 var leno = document.getElementById('OfficePhoneNumber').value;
 if(leno){
if(leno.length < 10){
  alert ( "Please Enter valid Office Phone Number" );
  return false; 
}
}
var lene = document.getElementById('EmergancyPhoneNumber').value;
if(lene){
if(lene.length < 10){
  alert ( "Please Enter valid Emergancy Phone Number" );
  return false; 
}
}
}
        </script>

        <article class="content-entry">
            <h4 class="article-title"><i></i>Medical Details</h4>
            <div class="accordion-content">
                <div class="well well-lg">
                
                      <div class="form-group">
                       <label>  Blood  group</label>
                       <br>
             
             
                <input type="text" name="bloodgroup" class="form-control" value="{{$member->bloodgroup}}"class="span10" />
               </div>
               
                      <div class="form-group">
                       <label>  Medical group</label>
                       <br>
             <label>A</label>
             
                <input type="text" name="SpecificGoalsa" class="form-control" value="{{$member->specificgoalsa}}"class="span10" />
               </div>
               <div class="form-group">
             <label>B</label>
             
                <input type="text" name="SpecificGoalsb" class="form-control"  class="span10"  value="{{$member->specificgoalsb}}"/>
               </div>
               <div class="form-group">
             <label>C</label>
             
                <input type="text" name="SpecificGoalsc" class="form-control"  class="span10"  value="{{$member->specificgoalsc}}"/>
               </div>
             </div>
             </div>
           
              </article>
               <article class="content-entry" >
            <h4 class="article-title"><i></i>Other Information</h4>
            <div class="accordion-content"><br/>
               <div class="well well-lg">
               <div class="form-group">
              <label>Hear About..</label>
             
                   <select  class="form-control" name="HearAbout"><option disabled="" selected>--Select Any--</option>
                    <option value="Fitness Five Member" {{$member->hearabout == 'Fitness Five Member' ? 'selceted':'' }}>Fitness Five Member</option>
                    <option value="We Called Them"{{$member->hearabout == 'We Called Them' ? 'selected':'' }}>We Called Them</option>
                    <option value="Friends/Family"{{$member->hearabout == 'Friends/Family' ? 'selected':'' }}>Friends/Family</option>
                    <option value="Via Internet"{{$member->hearabout == 'Via Internet' ? 'selected':'' }}>Via Internet</option>
                    <option value="Word Of Mouth"{{$member->hearabout == 'Word Of Mouth' ? 'selected':'' }}>Word Of Mouth</option>
                    <option value="Radio Advertise"{{$member->hearabout == 'Radio Advertise' ? 'selected':'' }}>Radio Advertise</option>
                    <option value="Magazine Advertise"{{$member->hearabout == 'Magazine Advertise' ? 'selected':'' }}>Magazine Advertise</option>
                             <option value="Other">Other</option>
                 </select>
              </div>
            
               <div class="form-group">
             <label>Profession</label>
             
                <input type="text" class="form-control" name="profession" placeholder="Profession" class="span11"  value="{{$member->profession}}" />
             
            </div>
              <div class="form-group">
             <label>Birthdate</label>
             
                <input placeholder="Birthdate" type="date" class="form-control" name="birthday" class="span11" value="{{$member->birthday}}">
            
            </div>
              <div class="form-group">
             <label>Anniversary</label>
             
                <input placeholder="Anniversary" type="date" class="form-control" name="anniversary" class="span11" value="{{$member->anniversary}}">
            
            </div>
           
                <div class="form-group">
             <label>Are you come by any company?</label>
             (if Yes than select)
            <select name="bycompany"type="text"class="form-control">
               <option disabled="" selected>--Select Any--</option>
              @foreach($company as $comp)

              <option value="{{$comp->companyid}}" {{$member->companyid == $comp->companyid ? 'selected': ''}}>{{$comp->companyname}}</option>
              @endforeach
            </select>
               </div>
              
             
            </div>
</div>
            <!--/.accordion-content-->
        </article>
         <article class="content-entry">
            <h4 class="article-title"><i></i>Fitness Goals & Exercise Program</h4>
            <div class="accordion-content"><br/>
              <div class="well well-lg">
                <label>Fitness Goals</label>
                  <table class="table table-bordered table-striped dataTable table-wrapper" aria-describedby="example1_info"><tr>
                                <td><label >LoseBodyFat
                     <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="1" {{$member->losebodyfat == 1 ? 'checked':''}}><span class="badge bg-orange">&check;</span></label></td>
                <td><label>DevelopMuscle
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="2" {{$member->developmuscle == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                     <tr> <td><label >ImproveBalance 
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="4" {{$member->improvebalance == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
          <td><label >RehabilitateAnInjury 
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="3"{{$member->rehabilitateaninjury == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
               <tr></tr> <td><label >ImproveFlexibility
                     <input type="checkbox" name="fitnessgoals[]"class="badgebox"  value="5"{{$member->improveflexibility == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                
                <td><label>NutritionalEducation
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="6"{{$member->nutritionaleducation == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                <tr><td><label>DesignBeginnersProgram
                    <input type="checkbox" name="fitnessgoals[]"class="badgebox"  value="7"{{$member->designbeginnersprogram == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                
                <td><label>DesignAdvancedProgram
                    <input type="checkbox" name="fitnessgoals[]"class="badgebox"  value="8"{{$member->desigadvancedprogram == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                
                <tr><td><label>TrainSpecific
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="9"{{$member->trainspecific == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label> Safety
                    <input type="checkbox" name="fitnessgoals[]"class="badgebox"  value="10"{{$member->safety == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                 <tr><td><label>MakeExerciseFun
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="11"{{$member->makeexercisefun == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label>Motivation
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="12"{{$member->motivation == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                  <tr><td><label> Other
                    <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="1"{{$member->other == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                    <td><textarea  name="OtherHelp" placeholder="OtherHelp"class="span2">{{$member->otherhelp}}</textarea></td></tr></table>
               <div class="form-group">  <label>What activities interest you ?</label>
                <br>
              <table class="table table-bordered table-striped dataTable table-wrapper" role="grid" aria-describedby="example1_info">
           
                <tr>
                <td><label>Baseball 
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"   value="1" {{$member->baseball == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                    <td><label> Basketball 
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="2" {{$member->basketball == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td> 
                <td><label>Boxing
                    <input type="checkbox" name="exerciseprograms[]"    class="badgebox" value="3"{{$member->boxing == 1 ? 'checked':''}}>  <span class="badge bg-orange">&check;</span></label></td></tr>
                    
                <tr><td><label> KickBoxing
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"   value="4" {{$member->kickboxing == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label> Skiing
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="5" {{$member->skiing == 1 ? 'checked':''}}><span class="badge bg-orange">&check;</span> </label></td>
                <td><label>Football
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="6" {{$member->football == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                <tr><td><label> Golf
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="7" {{$member->golf == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label>Hiking
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="8" {{$member->hiking == 1 ? 'checked':''}}>  <span class="badge bg-orange">&check;</span></label></td>
                 <td><label> Pilates
                    <input type="checkbox" name="exerciseprograms[]" class="badgebox"   value="9" {{$member->pilates == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                <tr><td><label>Racquetball
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="10" {{$member->racquetball == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                 <td><label>IndoorCycling
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="11" {{$member->indoorcycling == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                 <td><label> Kayaking
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="12" {{$member->kayaking == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td> </tr>
                 <tr><td><label> RockClimbing
                    <input type="checkbox" name="exerciseprograms[]" class="badgebox"   value="13" {{$member->rockclimbing == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                 <td><label> Running
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="14" {{$member->running == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                 <td><label> Soccer
                    <input type="checkbox" name="exerciseprograms[]"   class="badgebox" value="15" {{$member->soccer == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                <tr><td><label> Swimming
                    <input type="checkbox" name="exerciseprograms[]" class="badgebox"   value="16" {{$member->swimming == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>

                <td><label> Tennis
                    <input type="checkbox" name="exerciseprograms[]" class="badgebox"  value="17" {{$member->tennis == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label> Triathlon
                    <input type="checkbox" name="exerciseprograms[]" class="badgebox"   value="18" {{$member->triathlon == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
               <tr> <td><label>Walking
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="19" {{$member->walking == 1 ? 'checked':''}}>  <span class="badge bg-orange" >&check;</span></label></td>
                <td><label> WeightTrainning
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="20" {{$member->weighttrainning == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                <td><label>Yoga
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="21" {{$member->yoga == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td></tr>
                <tr><td><label>Stretching
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="22"{{$member->stretching == 1 ? 'checked':''}}><span class="badge bg-orange">&check;</span></label></td><td><label>Other
                    <input type="checkbox" name="exerciseprograms[]"  class="badgebox"  value="23" {{$member->other == 1 ? 'checked':''}}> <span class="badge bg-orange">&check;</span></label></td>
                    <td><textarea name="OtherActivity" placeholder="OtherActivity"class="span2">{{$member->otheractivity}}</textarea></td></tr></table></div> 
                      <div class="form-group">
             <label>How often a week whould you like to exercise ?</label>
             
                <input type="text" name="OftenWeekExercise" class="form-control" placeholder="Often Week Exercise" class="span11" value="{{$member->oftenweekexercise}}" />
               </div>
           <div class="form-group">
             <label>Where do you rank in health in your life ?</label> 
             <br>
                <label>
                      <input type="radio" name="rank"  value="h1" {{$member->highpriority == 1 ? 'checked':''}}>                    HighPriority
                    </label>
                
                    <label>
                      <input type="radio" name="rank"  value="m1"{{$member->mediumpriority == 1 ? 'checked':''}}>                     MediumPriority
                    </label>

                    <label>
                      <input type="radio" name="rank"  value="l1"{{$member->lowpriority == 1 ? 'checked':''}}>                      LowPriority
                    </label>
               </div>
                <div class="form-group">
             <label>How commited are you towards reaching your goals ?</label>
             <br>
                <label>
                      <input type="radio" name="goal"  value="v1" {{$member->very == 1 ? 'checked':''}}>                   Very
                    </label>
                
                    <label>
                      <input type="radio" name="goal"  value="s1" {{$member->semi == 1 ? 'checked':''}}>                    Semi
                    </label>

                    <label>
                      <input type="radio" name="goal"  value="b1" {{$member->barely == 1 ? 'checked':''}}>                      Barely
                    </label>
               </div>
          
      </div>
        </div>

            <!--/.accordion-content-->
        </article>
         </article>
       <article class="content-entry">
            <h4 class="article-title"><i></i>Profile Photo</h4>
            <div class="accordion-content">
                <div class="well well-lg">
               
              <div class="form-group">
             <label>Photo</label>
             
                <input type="file" name="file" class="form-control" id="profileimage" class="span11" />
                @if($member->photo)
                <img src="/files/{{$member->photo}}" id="img" height="100px">
                @endif
               </div>
            </div> 
  </article>
        <article class="content-entry">
            <h4 class="article-title"><i></i>ID Proof</h4>
            <div class="accordion-content"><br/>
              <div class="well well-lg">
                <div class="field" align="left">
                  <!-- <form action="{{url('IDupload')}}" method="post" enctype="multipart/form-data">  -->
                <h3>ID Proofs </h3><h5>(can attach more than one):</h5> 
               <input type="file" id="files" name="attachments[]" multiple />
               <br>
              
               <ul id="fn"></ul>
             <i id="file"></i>
            </div><br>

           </div>
         </div>
         
         <input type="submit" name="IDupload" class="btn bg-orange"value="Update" onclick="return chekform()">
              </form>
                   <script type="text/javascript">
              $("#fromtime").on("change", function(){
         var from=$("#fromtime").prop('selectedIndex');
         // alert(from);
         $('#totime option').eq(from).prop('selected', true);
    });
  $("#totime").on("change", function(){
         var to=$("#totime").prop('selectedIndex');
         // alert(from);
         $('#fromtime option').eq(to).prop('selected', true);
    });
  </script>
       </article>
             </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="packagedetails" style="overflow: auto">
                <!-- The timeline -->
              
                  <!-- timeline time label -->
            <!--  -->

               <div class="table-wrapper">
    <div class="table-title">

  <div class="box">
    <div class="box-header">
      <!-- <a href="{{ url('addterms') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a> -->


    <h3 class="box-title">All Packages</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body " > <div>

 <div class="col-sm-12">
        <table id="paymenthistorytable"  class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                <th>PackageId</th>
               
                <th>Scheme Name</th>
                <th>Current Status</th>
                <th>JoinDate</th>
                <th>EndDate</th>
                   <th>Assigned date</th>
                <th>Remaining Amount</th>
                <!-- <th>Actions</th> -->
              </tr>
              </thead>
              <tbody>
                @php $key=''; @endphp
                @foreach($packages as $key => $package)
              <tr> <td id="packagid"> {{ $package->memberpackagesid }}</td>
                <td> {{ $package->Scheme->schemename }}</td>
                    <td>{{$package->status == 1 ? 'active':'inactive'}}</td>
                    @if($package->status == 1)

              <td  id="joindate{{$key}}"><input type="date" name=""  value="{{$package->joindate}}"  min="<?php echo date("Y-m-d");?>"> </td>
       
                 <td id="enddate{{$key}}"><input type="date" name="" value="{{$package->expiredate}}"  min="<?php echo $package->expiredate;?>" > </td>
                 @else
                 <td>{{date('d-m-Y', strtotime($package->joindate))  }}</td>
                 <td>{{date('d-m-Y', strtotime($package->expiredate))  }}</td>
                 @endif

                 <td> {{date('d-m-Y', strtotime($package->created_at))  }}</td> 
             
                 <td>
              @if($t)   

                @if($t[$key]->remainingamount > '0')
                  @if( $package->status == '1')
                    <a  class="btn bg-light-navy" href="{{url('makePayment/'.$t[$key]->paymentid)}}">{{$t[$key]->remainingamount}}</a>
                  @else
                   {{'0'}}
                  @endif
                @else
                  {{'0'}}
                @endif
              @endif  </td>

               
              </td>
              </tr>

              @endforeach
                
              </tbody>
            </table></div>
         
 

            <script type="text/javascript">
        


var key="<?php echo $key;?>";

for(var i=0;i <= key; i++)
{

 $('#paymenthistorytable td#joindate'+i).on('change', function () {

console.log("new value : "+$(this).find('input[type=date]').val());
  var newdate = $(this).find('input[type=date]').val();
    var id = "<?php echo $member->userid;?>";

  var packageid = $(this).parent().find("td:first-child").text();

   var _token = $('input[name="_token"]').val();
 
    $.ajax({
      url:"{{ route('changedate') }}",
      method:"POST",
      data:{id:id, packageid:packageid, newdate:newdate, _token:_token},
      success:function(result) 
      {
       var dt = result;
      
      dt = dt.replace(/\"/g, "");
 
  
    location.reload();


 
        // alert(result);
      // alert('succesfully changedate');
      },
     
    })


});


 $('#paymenthistorytable td#enddate'+i).on('change', function () {
 console.log("new value : "+$(this).find('input[type=date]').val());
  var newdate = $(this).find('input[type=date]').val();
  var id= "<?php echo $member->userid;?>";
  // alert(newdate);
  var packageid = $(this).parent().find("td:first-child").text();
  // alert(packageid);
   var _token = $('input[name="_token"]').val();
 
    $.ajax({
      url:"{{ route('changeenddate') }}",
      method:"POST",
       data:{id:id, packageid:packageid, newdate:newdate, _token:_token},
      success:function(result) 
      {

      },
      // dataType:"json"
    })


});

}
// $('#paymenthistorytable td').on('input', function () {
//   console.log($(this).text());
// });


</script>
<!-- /.box-body -->

</div>
</div>
</div>
</div>
</div></div>
 <div class="tab-pane" id="Consent">
                <!-- The timeline -->
              
                  <!-- timeline time label -->
            <!--  -->

               <div class="table-wrapper">
    <div class="table-title">

  <div class="box">
    <div class="box-header">
      <!-- <a href="{{ url('addterms') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a> -->

</div>
    <h3 class="box-title">Consent Form</h3>
  
    <!-- /.box-header -->
    <div class="box-body" style="font-family: Calibri; display: none"> 
<div class="wrap-contact100">
      <div class="contact100-form-title" style="background-image: url(/images/fitness5.png);"> <!-- style="background-image: url(/images/FITNESSFIVE-logo.jpg);" -->
        <span class="contact100-form-title-1">
           <img src="{{ asset('/images/fitness5.png')}}" width="100" height="100"> 
        </span>

        <span class="contact100-form-title-2">
          <h3>Consent Form</h3>
        </span>
      </div>
                <form class="contact100-form validate-form" action="{{ url('Printconsentform')}}" method="get">

      <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Date</span>
          <input class="input100 form-control" type="date" name="date" placeholder="Enter full name" value="{{Carbon\Carbon::today()->format('Y-m-d')}}">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Full Name :</span>
          <input class="input100" type="text" name="firstname" placeholder="Enter full name" value="{{$member->firstname}}">
          <input type="hidden" name="lastname" value="{{$member->lastname}}">
          <span class="focus-input100"></span>
        </div>

   <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Member ID :</span>
          <input class="input100" type="text" name="memberid" placeholder="MemberID" value="{{$member->mid}}">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Address :</span>
          <textarea class="input100" name="Address" placeholder="Your Address">{{$member->address}}</textarea>
          <span class="focus-input100"></span>
        </div>

        
        <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Phone No:</span>
          <input class="input100" type="text" name="phone" value="{{$member->mobileno}}" placeholder="Enter phone number">
          <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <span class="label-input100">Email:</span>
          <input class="input100" type="text" name="email" value="{{$member->email}}" placeholder="Enter email addess">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Phone is required">
          <span class="label-input100">Emergency Contact No:</span>
          <input class="input100" type="text" name="emergancyphoneno" value="{{$member->emergancyphonenumber}}" placeholder="Enter phone number">
          <span class="focus-input100"></span>
        </div>

        <div>
          <p style="font-family: Calibri; size: 3px;">In consideration of my desire to engage in an exercise programme at the FITNESSFIVE.I understand and agree to following :</p>
          <span class="focus-input100"></span>
        </div><br/>

        <div>
          <ol>
            <li>   Participation by me in this activity is entirely voluntaty</li><br/>
            <li>Before i Engage in any activity i have informed all my medical history to the team member of FITNESSFIVE and have complated health history form as well as an evaluation with physical therapist to determine my risk of participating exercise.i m sumbmitting all helth report to FITNESSFIVE.</li><br/>
            <li>If the health history,physical activity evaluation indicate that i should see my physical before exercising,i will do that. </li><br/>
            <li>I understand that the possibility exists that certain changes may occur during exercise,they may include musclar strain,sprain and delayed onset muscle soreness abnormal B.P,fainting,disturbance of heart rhythm and very rare instances of heart attack.</li><br/>
            <li>I understand that i can minimize the risk of adverse changes occurring during exercise by adhering to exercise guideline which include warm up and cool down.</li>
          </ol>
          <span class="focus-input100"></span>
        </div>

        <div>
          <p>This agressment is binding on my assigns.</p>
          <span class="focus-input100"></span>
        </div><br/><br/><br/>

      <div class="row">
    <div class="col-sm-4">SIGNATURE<br/>(MEMBER)</div>
    <div class="col-sm-4">SIGNATURE<br/>(WITNESS)</div>
    <div class="col-sm-4">TEAM FITNESSFIVE</div>
  </div>
  <br>

<div class="col-sm-9" style="margin-top: 15px; float: right; margin-left: 120px;">
  
   
           </div>     
           </div>
         </div>
         <br>
         Download Consent Form &nbsp;
       <button type="submit" class="btn bg-orange fa fa-download" value="print"><font style="font-family: fantasy;"></font>   Download</button>
       <br>
</div>


      </form>

<!-- /.box-body -->




                  <!--     <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div> -->
                  
                  <!-- </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <!--<li>
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
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                       <!--<li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                       <!--<li>
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
                
                </ul>
             
            </article>
</div>
</div>
</div>
              <!-- /.tab-pane -->

           
          <div class="tab-pane" id="paymenthistory" style="overflow: auto">

            <div class="box box-body"> 
             <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
             <thead>
              <tr>
              <th>username</th>
              <th>Payment Date</th>
              <th>Mode</th>
              <th>Actual Amount</th>
              <th>Paid Amount</th>
              <th>Tax</th>
              <th>Discount</th>
             
              <th>Receipt No</th>
              <th>Print</th>
              <!-- <th>Actions</th> -->
              </tr>
              </thead>
              <tbody>
               
                @foreach($payment as $key => $payment)
                @if($payment->mode != '-' && $payment->mode != 'no mode')

                <tr><td>{{ $member->username }}</td>

                    <td> {{date('d-m-Y', strtotime( $payment->paymentdate))  }}</td>
                    <td> {{ $payment->mode }}</td> 
                    <td> {{ $payment->actualamount }}</td>   
                    <td> {{ $payment->amount }}</td>  
                    <td> {{ $payment->tax }}</td>  
                    <td> {{ $payment->discount > 0 ? $payment->discount : '0' }}</td> 
                   
                     <td> {{ $payment->receiptno}}</td>       
                     <td><a href="{{url('paymentforreceiptno/'.$payment->receiptno)}}"><i class="fa fa-print"></i></a></td>
              </td>
              </tr>
                @endif
              @endforeach
              </tbody>
            </table></div>
<!-- /.box-body -->

</div>
</div>

                 <div class="active  tab-pane" id="timeline">
                <div class="content">
                  <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <!-- <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li> -->
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <!-- <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- END timeline item -->
                  <!-- timeline item -->
                 <!--  <li>
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
                <!--   <li>
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
                <!--   <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li> -->
                    @foreach($notify as $notify)
                     <li class="time-label">
                        <span class="bg-lightgreen">
                         {{ Carbon\Carbon::parse($notify->created_at)->format('d-m-Y')}}
                        </span>
                  </li>
             <li>
               <i class="fa fa-clock-o bg-orange"></i><div class="timeline-item">
                <div class="timeline-header">{{$notify->details}}</div></div></li>
             @endforeach
                </ul>

              </div>
            </div>
             
              
                 <div class="tab-pane" id="settings">
                <div class="content">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                <div class="col-lg-8">
                      <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                    </div>
                  </div>
                <!-- </form> -->
              </div>
            </div>

              <!---conset form-->
   
     <div class="tab-pane" id="notes1">
        <div class="box-body"> 
          <div class="col-sm-12">

          </div>
        </div>
     </div>
   <div class="tab-pane" id="consineform">
 
                    

<style type="text/css">
  /*.rating {
    float:left;
}*/

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
/*.rating:not(:checked) > input {
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
    content: '★ ';
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
}*/

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

/* my stuff */
/*#status, button {
    margin: 20px 0;
}*/




/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
}

/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
  margin: 0px; 
  padding: 0px; 
  box-sizing: border-box;
}

/*body, html {
  height: 100%;
  font-family: Poppins-Regular, sans-serif;
}*/

/*---------------------------------------------*/

a:focus {
  outline: none !important;
}

a:hover {
  text-decoration: none;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
  margin: 0px;
}

p {
  font-family: Poppins-Regular;
  font-size: 14px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
}

ul, li {
  margin: 0px;
  list-style-type: none;
}


/*---------------------------------------------*/
input {
  outline: none;
  border: none;
}

input[type="number"] {
    -moz-appearance: textfield;
    appearance: none;
    -webkit-appearance: none;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

textarea {
  outline: none;
  border: none;
  border-radius: inherit;
}

/*textarea:focus, input:focus {
  border-color: transparent !important;
}*/

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder {color: #999999;}
input:-moz-placeholder {color: #999999;}
input::-moz-placeholder {color: #999999;}
input:-ms-input-placeholder {color: #999999;}

textarea::-webkit-input-placeholder {color: #999999;}
textarea:-moz-placeholder {color: #999999;}
textarea::-moz-placeholder {color: #999999;}
textarea:-ms-input-placeholder {color: #999999;}

/*---------------------------------------------*/
button {
  outline: none !important;
  border: none;
  background: transparent;
}

button:hover {
  cursor: pointer;
}

iframe {
  border: none !important;
}




/*//////////////////////////////////////////////////////////////////
[ Contact ]*/

.container-contact100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: transparent;
  position: relative;
  z-index: 1;
}

.contact100-map {
  position: absolute;
  z-index: -2;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.wrap-contact100 {
  width: 670px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}

/*==================================================================
[ Title form ]*/
.contact100-form-title {
  width: 100%;
  position: relative;
  z-index: 1;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;

  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;

  padding: 64px 15px 64px 15px;
}

.contact100-form-title-1 {
  font-family: Poppins-Bold;
  font-size: 20px;
  color: #fff;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 7px;
}

.contact100-form-title-2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #fff;
  line-height: 1.5;
  text-align: center;
}


.contact100-form-title::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgba(54,84,99,0.7);
}


/*==================================================================
[ Form ]*/

.contact100-form {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 43px 88px 57px 190px;
}


/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 1px solid #b2b2b2;
  margin-bottom: 26px;
}

.label-input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.2;
  text-align: right;

  position: absolute;
  top: 14px;
  left: -105px;
  width: 80px;

}

/*---------------------------------------------*/
.input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;

  display: block;
  width: 100%;
  background: transparent;
  padding: 0 5px;
}

.focus-input100 {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-input100::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 0;
  height: 1px;

  -webkit-transition: all 0.6s;
  -o-transition: all 0.6s;
  -moz-transition: all 0.6s;
  transition: all 0.6s;

  background: #57b846;
}


/*---------------------------------------------*/
input.input100 {
  height: 45px;
}


textarea.input100 {
  min-height: 115px;
  padding-top: 14px;
  padding-bottom: 13px;
}


.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  /*padding-top: 8px;*/
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 160px;
  height: 50px;
  background-color: #57b846;
  border-radius: 25px;

  font-family: Poppins-Regular;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn i {
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn:hover {
  background-color: #333333;
}

.contact100-form-btn:hover i {
  -webkit-transform: translateX(10px);
  -moz-transform: translateX(10px);
  -ms-transform: translateX(10px);
  -o-transform: translateX(10px);
  transform: translateX(10px);
}


/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 576px) {
  .contact100-form {
    padding: 43px 15px 57px 117px;
  }
}

@media (max-width: 480px) {
  .contact100-form {
    padding: 43px 15px 57px 15px;
  }

  .label-input100 {
    text-align: left;
    position: unset;
    top: unset;
    left: unset;
    width: 100%;
    padding: 0 5px;
  }
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 2px;
  pointer-events: none;

  font-family: Poppins-Medium;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 15px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}

/*  .accordion-container {
    position: relative;
    width: 100%;
    border: 1px solid #82C030;
    border-top: none;
    outline: 0;
    cursor: pointer
}*/




</style>
                  </style>
                   
             
            <!-- /.tab-content -->

         
       </div>
   </div>
       </div>
    
            <div class="col-lg-10" style="margin-left: -16px">
              <br>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ID Proof Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table>
                <tr>
                  @if($img!="")
            @foreach($img as $img)

              <td><a href="/files/{{$img}}" target="_blank"><img src="/files/{{$img}}"  alt="Image Alternative text" title="{{$img}}" height="100px" /></a>
                        @endforeach    </td></tr></table>
                        @else
                        {{ 'No Any Id Proof uploaded' }}
                        @endif

            </div>
            <!-- /.box-body -->
          </div>
          </div>

          <!-- /.nav-tabs-custom -->
      
 
      <!-- /.row -->

   
    <!-- /.content -->
    

</section>
<script type="text/javascript">
   $('#package').on('click', function(){
   $(this).find('li').removeClass('active');
  $('#package').removeClass('active');
  });
</script>
  @endsection