@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>All Role</h2></section>
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

       <div class="box">
    <div class="box-header">
      <a href="{{ url('addrole') }}" class="bowercomponentscustomedarkbluebtn btn add-new bg-navy" style="height: 35px;"><i class="fa fa-plus"></i> Add New</a>

    <h3 class="box-title">All Role</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
      <div class="row">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
             <tr>
                <th>Name</th>
                <th>Description</th>
                <!-- <th>Extra</th> -->
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>@foreach($roles as $role)
              <tr>
                <td> {{ $role->employeerole }}</td>
                <td> {{ $role->description }}</td>
               <!--  <td>information</td> -->
              <td><a href="{{ url('editrole/'.$role->roleid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                  <!-- <a href="{{ url('deleterole/'.$role->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </td>
              </tr>
              
              @endforeach
            </tbody></div>
            </table>
<!-- /.box-body -->
</div>
        </div>

    </div>
  </div>
</div>
</div>
</div></div>
</div>
@endsection