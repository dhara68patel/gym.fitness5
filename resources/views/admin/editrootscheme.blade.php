@extends('layouts.adminLayout.admin_design')
@section('content')
 <div class="content-wrapper">
   
     
         <section class="content-header"></section>
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
              <h3 class="box-title">Edit Root Scheme</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-3"></div><div class="col-lg-6">
              <form role="form" action="{{ url('editrootscheme/'.$scheme->rootschemeid) }}"  method="post">
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Scheme Name</label>
                  <input type="text" class="form-control" value="{{$scheme->rootschemename}}" name="scheme_name" placeholder="Enter role name"required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                 <textarea class="form-control" rows="3"   name="description"placeholder="Enter Descrription"required>{{$scheme->description}}</textarea>
                </div>

                 <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                  <div class="col-sm-6">
                   <!--  <button type="button" class="btn bg-orange btn-flat margin">.btn.bg-orange.btn-flat</button> -->
         <button type="submit" class="btn bg-orange btn-flat btn-block">
         Update</button></div> 
          <div class="col-sm-6">
          <a href="{{ url('rootschemes') }}"class="btn bg-red btn-flat btn-block">Cancel</a></div>
        </div>
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