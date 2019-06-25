@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
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
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>View Followup</h2></section>
          <!-- general form elements -->
           <section class="content">
             <form class="form-inline" method="post" action="{{ url('followup') }}">
     {{ csrf_field() }}
    <!-- <div class="form-group">
    <label>Follow Up Date</label>
    <div class="input-group date" style="max-width:180px" id="enddate">
      <input type="date" class="form-control" name="from" placeholder="To Date" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" />
      
    </div>
</div> -->
  <br/><br>


 
      @if ($message = Session::get('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif 
    <div class="table-wrapper">
    <div class="table-title">

  <div class="box">
    <div class="box-header">
      <a href="{{ url('addfollowup/'.$id) }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a>


   
    </div>
    <!-- /.box-header -->
    <div class="box-body">
<div class="col-sm-12" style="overflow: scroll;">
        <table id="followupdata" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" >
          <thead>
              <tr>
                <th>FollowUpTime</th>
                <th>FollowUpDate</th>
                <th>Status</th>
                <th>SpecificTime</th>
                <th>FollowUpTakenDate</th>
                <th>Reason</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>@foreach($followup as $followup)
              <tr>

                <td> {{ $followup->FollowUpTime }}</td>
                @if($followup->created_at != null)
                  <td> {{date('j F, Y', strtotime($followup->created_at)) }}</td>
                 @else
                  <td></td>
               @endif
                <td> {{ $followup->Status }}</td>
                <td> {{ $followup->Remarks }}</td>
                @if($followup->Status == 'Pending' || $followup->Status == 'pending')
                  <td> {{date('j F, Y', strtotime($followup->FollowUpDays)) }}</td>
           
                @else
                <td> {{date('j F, Y', strtotime($followup->FollowUpTakenDate)) }} </td>
                @endif
                <td> {{ $followup->Reason}}</td>
                
                
              <td><a href="{{ url('editfollowup/'.$followup->id) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                 <!--  <a href="{{ url('deleteterm/'.$followup->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </td>
              </tr>

              @endforeach


              </tbody>

            </table><a href="{{ url('closeinquiry/'.$followup->InquiryId) }}" class="delete btn add-new bg-navy" title="Delete"><i class="fa fa-trash"></i>Close inquiry</a></div>
<!-- /.box-body -->

</div>
</div>
</div>


</div>
</div>
</div>
</section>
</div></div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#followupdata').DataTable( {
 
    });
    });
</script>
@endsection