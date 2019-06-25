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
   
     
         <section class="content-header"><h2>All Terms</h2></section>
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

  <div class="box">
    <div class="box-header">
      <a href="{{ url('addterms') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a>


    <h3 class="box-title">All Terms</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="overflow: scroll;"> 
      <div class="row"><div class="col-sm-12">
        <table id="example1" class="table table-bordered  table-striped center dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                <th style="display: none"></th>
                <th>Terms</th>
                <th>Credit into Minute</th>
                <th>Appointment</th>
               <!--  <th>Actions</th> -->
              </tr>
              </thead>
              <tbody>@foreach($terms as $term)
              <tr>
                <td style="display:none">{{$term->termsid}}</td>
                <td> {{ $term->terms }}</td>
                <td style="width:auto;"> {{ $term->minutes }}</td>
                <td> @if($term->appointment==1) {{'Required'}} @else {{''}} @endif</td>
              <!-- <td><a href="{{ url('editterm/'.$term->termsid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a> -->
                 <!--  <a href="{{ url('deleteterm/'.$term->termsid) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </td>
              </tr>

              @endforeach
              </tbody>
            </table></div>
<!-- /.box-body -->
</div>
</div>
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
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
$('#example1').DataTable({
       stateSave: false,
       paging:  true,

    
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
         "order":    [[ 0, "asc" ]],
   });
</script>

</div>
</section>
</div></div>
@endsection