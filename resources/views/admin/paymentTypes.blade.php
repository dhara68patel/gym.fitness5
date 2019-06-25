@extends('layouts.adminLayout.admin_design')
@section('content')
  <div class="content-wrapper">
       
         <section class="content-header"><h2>All Payment Types</h2></section>
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
      <a href="{{ url('addpaymenttype') }}" class="btn add-new bg-navy"><i class="fa fa-plus"></i> Add New </a>

    <h3 class="box-title">All PaymentTypes</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
      <div class="row">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
             <tr>
                <th>Name</th>
                <th>Description</th>
               
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>@foreach($paymentTypes as $paymentType)
              <tr>
                <td> {{ $paymentType->paymenttype }}</td>
                <td> {{ $paymentType->description  }}</td>
                
              <td><a href="{{ url('editpaymenttype/'.$paymentType->paymenttypeid) }}"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
  <!--                 <a href="{{ url('deletepaymenttype/'.$paymentType->id) }}"class="delete" title="Delete"><i class="fa fa-trash"></i></a> -->
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