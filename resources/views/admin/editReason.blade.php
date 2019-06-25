@extends('layouts.adminLayout.admin_design')
@section('content')
 <div class="content-wrapper">
   
     
         <section class="content-header">Edit Reason</section>
          <!-- general form elements -->
           <section class="content">
             @if ($errors->any())
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">×</button> 
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Edit Reason</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('editReason/'.$reason->reasonid) }}"  method="post">
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Reason</label>
                  <input type="text" class="form-control" value="{{$reason->reason}}" name="reason" placeholder="Enter Reason"  required="">
                </div>
             

                  <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-orange margin">
         Update</button>
         <a href="{{ url('reasons') }}"class="btn bg-red margin">Cancel</a>
        </div>
                <!-- Select multiple-->
        

              </form></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection