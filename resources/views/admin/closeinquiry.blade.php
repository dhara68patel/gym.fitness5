@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Close Inquiry</h2></section>
          <!-- general form elements -->
           <section class="content">
          
              @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Close Inquiry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> <div class="col-lg-4"></div><div class="col-lg-4">
              <form role="form" action="{{ url('closeinquiry/'.$id) }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Reason</label>
                  <select class="form-control" name="reason">@foreach($Reasons as $reason)
                   <option value="{{$reason->reasonid}}">{{$reason->reason}}</option>
                      
            
                    @endforeach
                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3"  name="description" placeholder="Enter Descrription"></textarea>
                </div>

                      <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn btn-info btn-block">
         Save</button></div>   <div class="col-sm-6"> <a href="{{ url('inquiry') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
      </div>
                <!-- Select multiple-->
              </form></div><div class="col-lg-3"></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection