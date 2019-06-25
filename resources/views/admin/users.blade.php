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
   
     
         <section class="content-header"><h2>All Users</h2></section>
          <!-- general form elements -->
        

<div class="container-fluid">
  <hr> 
  @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif 
<div class="table-wrapper">
  <div class="table-title">

       <div class="box content-fit-box">
    <div class="box-header">
      <a href="{{ url('addUser') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i> Add New</a>

    <h3 class="box-title">All Users</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"><div class="col-lg-12"  style="overflow:auto;">
      
        <table id="example1"class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
             <tr>
                        <th>UserName</th>
                        <th>Role</th>
                        <th>Email id</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <!-- <th colspan="2">Working Hour</th> -->
                       <!--  <th>Birthdate</th> -->
                        <th>Gender</th>
                        <th>Mobile No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>@foreach($users as $user)
                    <tr>
                        <td> {{ $user->username }}</td>
                        <td>{{$user->employeerole}} </td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->address }}</td>
                        <td> {{ $user->city }}</td>
                        <td> {{ $user->department }}</td>
                        <td> {{ $user->salary }}</td>
                        <!-- <td> {{date('h-i a', strtotime($user->working_hour_from_1)) }}</td>
                        <td>{{date('h-i a', strtotime($user->working_hour_to_1)) }}</td> -->
                        <!-- <td> {{ $user->dob }}</td> -->
                        <td> {{ $user->gender }}</td>
                        <td> {{ $user->mobileno }}</td>
                        <td>
                            <a href="{{ url('edituser/'.$user->employeeid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                           <!--  <a href="{{ url('deleteuser/'.$user->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
                        </td>
                    </tr>
              @endforeach
            </table></div>
<!-- /.box-body -->
</div>
        </div>
 
      
   
    </div>

    </div>

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

  </div>

</div></div>
@endsection