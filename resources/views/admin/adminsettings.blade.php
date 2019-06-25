@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>All Settings</h2></section>
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
      <!-- <a href="{{ url('addterms') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i>Add New</a> -->


    <h3 class="box-title">All Settings</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"> <div class="col-lg-3"></div><div class="col-lg-6">
      <div class="row"><div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                <th colspan="4">Settings</th>
                
              </tr>
              <tr><th>Title</th>
                <th>Value</th>
                <!-- <th>Actions</th> --></tr>
              <tbody>@foreach($settings as $setting)
              <tr>
               
              

                <td> {{ $setting->title }}</td>
                <td> {{ $setting->description }}</td>
                
              
                
              <td><a href="{{ url('editsetting/'.$setting->adminmasterid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                  <!-- <a href="{{ url('deletesetting/'.$setting->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
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

</div></div>
</div>
@endsection