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
  
</style>

  <div class="content-wrapper">
<section class="content-header"><h2>All Scheme</h2></section>
<div class="container-fluid"> 
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
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
                <a href="{{ url('addscheme') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a>
               <h3 class="box-title">All Schemes</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>RootScheme</th>
                <th>Scheme</th>
                <th>Number Of Days</th>
                <th>Base Price</th>
               
                <!-- <th>Tax</th> -->
                <th>Actual Price</th>
                 <th>Validity</th>
                <th>Status</th>
                <th>Actions</th>
                 
                </tr>
                </thead>
                <tbody>
                 @foreach($schemes as $scheme)
                <tr>
                <td> {{ $scheme->RootScheme->rootschemename }}</td>
                <td> {{ $scheme->schemename }}</td>
                <td> {{ $scheme->numberofdays }}</td>
                <td> {{ $scheme->baseprice }}</td>
                <!-- <td> {{ $scheme->Tax }}</td> -->
                <td> {{ $scheme->actualprice }}</td>
                @if($scheme->validity)
                <td>{{date('j F, Y', strtotime($scheme->validity))}}</td>
                @else
                <td></td>
                @endif
                <td>
                  {{ $scheme->status == '1' ? 'active' : inactive }} </td>
                  <td><a href="{{ url('editscheme/'.$scheme->schemeid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>             
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

<!-- page script -->
<!-- <script>
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
</script> -->

<!-- <script type="text/javascript">
  $('#example1').DataTable({
       stateSave: false,
       paging:  true,
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
   });
</script> -->
<script type="text/javascript">
  $('#example1').DataTable({
        stateSave: true,
                paging:  true,
                "ordering" : true,
            "scrollCollapse" : true,
            "order": [[ 0, "desc" ]],
            // sorting:false,
            
            "columnDefs" : [{"targets":1, "type":"date-eu"}],
            "bInfo": true
    });
</script>

</div>
</div>
</div>
</div>
@endsection