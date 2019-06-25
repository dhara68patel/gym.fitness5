@extends('layouts.adminLayout.admin_design')
@section('content')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

   

  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>All Companies</h2></section>
          <!-- general form elements -->
           <section class="content">
 

 
      @if ($message = Session::get('message'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
      @endif 
    <div class="table-wrapper">
    <div class="table-title">


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          

           <div class="box">
    <div class="box-header">
      <a href="{{ url('addCompany') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a>


    <h3 class="box-title">All companies</h3>
    </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example1" class="table table-bordered table-striped" style="width: auto;">
                <thead>
                <tr>
                  <th>Company</th>
                  <th>GstNo</th>
                  <th>Contact Person</th>
                  <th>Contact No</th>
                  <th>Address</th>
                  <th>Actions</th>
                 
                </tr>
                </thead>
                <tbody>
                 @foreach($company as $comp)
                <tr>
                    <td> {{ $comp->companyname }}</td>
                    <td> {{ $comp->gstno }}</td>
                    <td> {{ $comp->contactpersonname}}</td>
                    <td> {{ $comp->contactpersonmobileno}}</td>  
                    <td> {{$comp->companyaddress}} </td>
                  <td><a href="{{ url('editcompany/'.$comp->companyid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>              
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
    </section>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
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
  $('#example1').DataTable({
       stateSave: false,
       paging:  true,
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
   });
</script>

</div>
</div>
</div>
</section>
</div></div>
@endsection