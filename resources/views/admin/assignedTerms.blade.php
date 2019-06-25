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
   
     
         <section class="content-header"><h2>Schemes Terms</h2></section>
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
    <!--   <a href="{{ url('assignterms') }}" class="btn add-new btn-info "><i class="fa fa-plus"></i> Add New</a>
 -->
    <h3 class="box-title">All Assigend Terms</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"><div class="col-lg-10">
      
      <table id="example1" class="table table-bordered table-striped dataTable" role="grid"aria-describedby="example1_info">
        <thead>
          <tr>
              <th>SchemeName</th>@foreach($terms as $term)
              <th>{{$term->terms}}</th> @endforeach
              <!-- <th>Actions</th>  -->
          </tr>
        </thead>
        <tbody> @php $i=0; $t='_'; @endphp
           @foreach($schemes as $scheme)
          <tr>
            <td> {{ $scheme->schemename }}</td> 

             @foreach($terms as $term)
            <td> {{$t}}
        @foreach($schemeterms as $schemeterm)
     
      @if($schemeterm->termsid == $term->termsid and $scheme->schemeid == $schemeterm->schemeid)

        @if($schemeterm->value == 0){{'unlimited'}}

          @else 


       {{ $schemeterm->value > 0 ? $schemeterm->value : '' }}

      @php  $t='_'; @endphp 
       @endif

     </td>
   
          @endif

               @endforeach    
    
               
           @endforeach 
          <!-- 
            <td><a href="{{ url('editassignterms/'.$scheme->schemeid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a> -->
                <!-- <a href="{{ url('deletescheme/'.$scheme->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </tr> 
          @endforeach 
            
             </tbody>
            </table></div>
<!-- /.box-body -->
</div>
        </div>
    </div>

    </div>





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


  </div>

</div></div>
@endsection