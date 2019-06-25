@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
 <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <style type="text/css">
   .table-bordered {
    border: 1px solid #f4f4f4;
}
 </style>
<script src="../../bower_components/datatables.net/js/jquery.js"></script>
<script data-require="datatables@*" data-semver="1.10.12" src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/dataTables.responsive.js"></script>
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>All Members</h2></section>
          <!-- general form elements -->
        
    <div class="container-fluid">
       @if ($message = Session::get('message'))
<div class="alert alert-success alert-block" id="#success-alert">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif 
      <form class="form-inline" method="post" action="{{ url('members') }}">
     {{ csrf_field() }}
    <div class="form-group">
    <label for="user" class="sr-only">User Name</label>
    <select data-width="180px" name="username" class="form-control selectpicker" id="username" title="Select Party" data-live-search="true" data-selected-text-format="count"  data-actions-box="true" data-count-selected-text="{0} User Name Selected" data-header="Select Username">
      <option value="" selected disabled>Select User Name</option>
      <option value="" >All</option>
      @foreach($users as $user)
        <option value="{{ $user->userid }}">{{ $user->username }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="partyid" class="sr-only">Mobile No.</label>
    <select data-width="180px" name="mobileno" class="form-control selectpicker" id="mobileno">
      <option value="" selected disabled>Select Mobile No.</option>
      <option value="" >All</option>
       @foreach($users as $user)
        <option value="{{ $user->userid }}">{{ $user->mobileno }}</option>
      @endforeach
    </select>
  </div>
   <div class="form-group">
    <label class="sr-only" for="search">Any Keyword</label>
    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Any Keyword">
  </div>
  <div class="form-group">
    <label>From</label>
    <div class="input-group date" style="max-width:180px" id="startdate">
      <input type="date" class="form-control " name="from" placeholder="From Date" />
    
    </div>
    <label>To</label>
    <div class="input-group date" style="max-width:180px" id="enddate">
      <input type="date" class="form-control" name="to" placeholder="To Date" />
    </div>
  </div>
  <br/><br>
  <div class="form-group">
    <button name="submit" type="submit" class="btn bg-orange margin">Search</button> <a href="{{ url('members') }}" class="btn bg-red margin">Clear</a>
  </div>

  <hr> 
 

    @if($message=="User Is Already Exits")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>

@endif 
<div class="table-wrapper">
  <div class="table-title">

       <div class="box content-fit-box">
    <div class="box-header">
      <a href="{{ url('addMember') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i> Add New</a>

    <h3 class="box-title">All Members</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-lg-12">
<!--         <table id="contractdata" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive"> -->
        <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" id="memberdata">
          <thead>
             <tr>       <th>view</th>
                      
                        <th>Full Name</th>
                        
                        <th>UserName</th>
                      
                        <th>Email</th>
                        <th>Cell Phone Number</th>
                        <th>Working Hours From</th>
                        <th>Working Hours To</th>
                      
                       
                       
                          <th>City</th>
                        <!-- <th>Form No.</th> -->
                       
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>@if($members!="")
                  @foreach($members as $member)
                    <tr>
                      <td><a href="{{ url('memberProfile/'.$member->memberid) }}"class="edit" title="Edit"><i class="fa fa-eye"></i></a></td>
                  
                      
                        <td>{{$member->firstname}} {{ $member->lastname }} </td>
                        <td> {{ $member->username }}</td>
                        <td> {{ $member->email }}</td>
                        <td> {{ $member->mobileno }}</td>
                 
                        <td> {{date('h-i a', strtotime($member->workinghourfrom)) }}</td>
                        <td>{{date('h-i a', strtotime($member->workinghourto)) }}</td>
                        
                        <td> {{ $member->city }}</td>
                       <!-- <td> {{ $member->FormNo }}</td>  -->
                     
                        <!-- <td> {{ $member->Birthday }}</td> -->
                       <!--  <td>
                            <a href="{{ url('editMember/'.$member->id) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>-->
                            <!-- <a href="{{ url('deleteuser/'.$member->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
                        <!--</td> -->
                   
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
  $(document).ready(function(){
           
                $("#success-alert").fadeOut(2000, 500).slideUp(500, function(){
               $("#success-alert").slideUp(500);
                });  
                });
                </script> 
 
<script type="text/javascript">
  $(document).ready( function () {
  $('#memberdata').DataTable( {
    responsive: true
});
});
</script>

@endsection