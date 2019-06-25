@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Root Scheme</h2> </section>
          <!-- general form elements -->
           <section class="content ">
           
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
              <h3 class="box-title">Root Scheme</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('addrootscheme') }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Scheme Name</label>
                  <input type="text" class="form-control" name="scheme_name" required placeholder="Enter Scheme Name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3"  name="description" required placeholder="Enter Descrription"></textarea>
                </div>

                         <div class="form-group">   <div class="col-sm-offset-3">
   <div class="col-sm-8">
      <button name="submit" type="submit" class="btn bg-blue margin">Save</button>   <a href="{{ url('rootschemes') }}"class="btn btn-danger">Cancel</a></div></div>
  
  </div>
                <!-- Select multiple-->
        

              </form></div><div class="col-lg-3"></div></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection
