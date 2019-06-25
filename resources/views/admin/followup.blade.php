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
 

  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>View Followup</h2></section>
          <!-- general form elements -->
           <section class="container-fluid">
            <br>
             <form class="form-inline" method="post" action="{{ url('followup') }}">
     {{ csrf_field() }}

    <label><b>Follow Up Date</b></label>
    <div class="form-group">
      &emsp;<label>From</label>
    <div class="input-group date" style="max-width:180px" id="startdate">
      <input type="date" class="form-control " name="from" placeholder="From Date" />
    
    </div>
    <label>To</label>
    <div class="input-group date" style="max-width:180px" id="enddate">
      <input type="date" class="form-control" name="to" placeholder="To Date" />
    </div>
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <option value="" selected="">--Please select status--</option>
      <option value="2">Converted Into Member</option>
      <option value="1">Pending</option>
      <option value="3">Confirmed</option>
      <option value="4">Close Inquiry</option>
    </select>
  </div>
    <!-- <div class="input-group date" style="max-width:180px" id="enddate">
      <input type="date" class="form-control" name="from" placeholder="To Date" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" /> -->
      
    

  <br/><br>
  <div class="form-group">
    <button name="submit" type="submit" class="btn bg-orange margin">Search</button> <a href="{{ url('followup') }}" class="btn bg-red margin">Clear</a>
  </div>

</form>
 
      @if ($message = Session::get('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif 
 <div class="table-wrapper">
    <div class="table-title">

   <div class="box-header">
       
    </div>

      <div class="row">
        <div class="col-xs-12">
          

          <div class="box container-fluid">
            <div class="box-header">
   <!--    <a href="{{ url('addterms') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a> -->


    <h3 class="box-title">All followup</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
  
       <table id="allfollowup" class="table table-bordered table-striped">
          <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Cell No.</th>
                <th>FollowUpTime</th>
                <th>FollowUpDate</th>
                <th>Status</th>
    
                <!-- <th>Actions</th> -->
              </tr>
              </thead>
              <tbody>@foreach($followup as $followup)
              <tr>
                
                <td> {{ $followup->firstname }}</td>
                <td> {{ $followup->lastname }}</td>
                <td> {{ $followup->gender }}</td>
                <td> {{ $followup->email }}</td>
                <td> {{ $followup->mobileno }}</td>
                <td> {{ $followup->followuptime }}</td>

          @if($followup->followuptakendate != null)  
      <td>{{date('j F, Y', strtotime($followup->followuptakendate))}}</td>
      @else
      <td>{{date('j F, Y', strtotime($followup->followupdays))}}</td>
      @endif
   
                <td>@if($followup->fstatus == 2) Convert Into Member @elseif($followup->fstatus == 3) Confirmed Inquiry @elseif($followup->fstatus == 4) close Inquiry @else pending @endif</td>
              
             
             
              <!-- <td><a href="{{ url('editfollowupmodel/'.$followup->followupid) }}"class="edit" title="Edit"><i class="fa fa-eye"></i></a> -->
                 <!--  <a href="{{ url('deleteterm/'.$followup->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </td>
              </tr>
              @endforeach
              </tbody>
            
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
  </div>
</div>
    </section>
  </div>

<!-- page script -->
<script>
  $(function () {
    $('#allfollowup').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
   $(document).ready(function() {
    $('#allfollowup').DataTable();
  });
</script>
@endsection