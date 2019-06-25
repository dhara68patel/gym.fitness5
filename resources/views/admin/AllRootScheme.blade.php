@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>All Root Scheme</h2></section>
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
      <a href="{{ url('addrootscheme') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a>


    <h3 class="box-title">All Root Scheme</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"> <div class="col-lg-3"></div><div class="col-lg-6">
      <div class="row"><div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                <th>Scheme Name</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>@foreach($rootschemes as $scheme)
              <tr>
                <td> {{ $scheme->rootschemename }}</td>
                <td> {{ $scheme->description }}</td>
                
              <td><a href="{{ url('editrootscheme/'.$scheme->rootschemeid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                 <!--  <a href="{{ url('deleterootscheme/'.$scheme->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
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
</div>
</section>
</div></div>
@endsection