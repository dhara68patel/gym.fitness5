@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Package Edit</h2></section>
          <!-- general form elements -->
        
    <div class="container-fluid">
       @if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif 


  <hr> 
  @if ($message = Session::get('message'))
    @if($message=="Succesfully added")
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message=="User Is Already Exits")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
@endif 
<div class="table-wrapper">
  <div class="table-title">

       <div class="box content-fit-box">
    <div class="box-header">
     <!--  <a href="{{ url('addMember') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i> Add New</a>
 -->
    <h3 class="box-title">Member :: </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-lg-8"> <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                <th>MemberPackageId</th>
                <th>Username</th>
                <th>Scheme Name</th>
                <th>RecieptNo</th>
                <th>JoinDate</th>
                <th>EndDate</th>
                <th>Current Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>@foreach($packages as $key => $package)
              <tr> <td> {{ $package->id }}</td>
               
                <td> {{ $package->Scheme->SchemeName }}</td>
              
                  @foreach($package->User as $user)
                <td> {{ $user->username }}</td>  
            @endforeach
<!--              
             -->
         
           <td> {{date('d-m-Y', strtotime($package->Join_date))  }}</td>
                 <td> {{date('d-m-Y', strtotime($package->Expire_date))  }}</td>
                 <td>{{$package->status}}</td>
              <td><a href="{{ url('editpackage/'.$package->id) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                 <!--  <a href="{{ url('deleteterm/'.$package->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
              </td>
              </tr>

              @endforeach
              </tbody>
            </table>
        </div>
<!-- /.box-body -->
</div>
        </div>
 
      
   
    </div>

    </div>
  </div>

</div></div>
<script type="text/javascript">
  $(function () {
    $('.date').datetimepicker({format: 'DD/MM/YYYY',useCurrent: 'day'});
  });
</script>
@endsection