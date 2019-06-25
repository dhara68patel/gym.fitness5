@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> --> <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="../../bower_components/datatables.net/js/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.responsive.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<style type="text/css">
  .rating {
    float:left;
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
.table-bordered {
    border: 1px solid #f4f4f4;
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
</style>
  <div class="content-wrapper">
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
     
         <section class="content-header"><h2>All Confirm Inquiry</h2></section>
          <!-- general form elements -->
        <br>

<div class="container-fluid">
<!--   <form class="form-inline" method="post" action="{{ url('inquiry') }}">
     {{ csrf_field() }}

 

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
  </div> -->
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

 

<!-- </form> -->

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

       <div class="box content-fit-box">
    <div class="box-header">
     
    <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"><div class="col-lg-12">
      
        <table id="inquiryconfirmdata" class="table table-bordered  dataTable" >
          <thead>
             
                        <th>Created Date</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>               
                        <th>Email</th>
                        <th>Cell </th>
                        <!-- <th>Profession</th> -->
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>@if($inqs!="")
                  @foreach($inqs as $inq)

                    <tr>
                       
                        <td> {{ \Carbon\Carbon::parse($inq->CreatedDate)->format('d-m-Y')}}</td>
                        <td>{{$inq->firstname}} </td>
                        <td> {{$inq->lastname }}</td>
                        <td> {{ $inq->gender }}</td>                     
                        <td> {{ $inq->email }}</td>
                        <td> {{ $inq->mobileno }}</td>
                        <!-- <td> {{ $inq->Profession }}</td> -->
                        <td> {{ $inq->remarks }}</td>
                       
                        <!-- <td> {{ $inq->Birthday }}</td> -->
                        <td>

                            <a href="{{ url('convertmember/'.$inq->inquiriesid) }}" class="check" title="convert into Member"><i class="fa fa-user"></i></a>

                            &nbsp;&nbsp;&nbsp;

                            <a href="{{ url('editinquiry/'.$inq->inquiriesid) }}"class="edit" title="Edit Confirm Inquiry"><i class="fa fa-edit"></i></a>
                            <!-- <a href="{{ url('deleteuser/'.$inq->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
                             &nbsp;&nbsp;&nbsp;

                             <a href="{{ url('closeinquiry/'.$inq->inquiriesid) }}" class="delete"  title="Delete Confirm Inquiry"><i class="fa fa-times"></i></a>
                       
                           
                        </td>
                    </tr>
              @endforeach
              @endif
             
 
            </tbody>
            </table></div>
<!-- /.box-body -->
</div>
        </div>
 
      
   
    </div>

    </div>
  </div>

</div></div>
<script type="text/javascript">


   $(document).ready(function() {
    $('#inquiryconfirmdata').DataTable( {
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
@endsection