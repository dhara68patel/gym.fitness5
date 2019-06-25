@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Followup</h2></section>
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
              <h3 class="box-title">Add Followup</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body"> <div class="col-lg-4"></div><div class="col-lg-4">
              <form role="form" action="{{ url('editfollowup/'.$f->id) }}" method="post" >
                 {{ csrf_field() }}
                <!-- text input -->
               <div id="Followupdetails" class="addfollowers">
                <div class="form-group">
                  <label>Reason</label>
                  <input type="text" name="Reason" class="form-control" required="" value="{{$f->Reason}}">
                </div>

                    <div><b>Followup Date</b><input type="date" name="FollowUpDays" value="{{$f->FollowUpDays}}" class="form-control" ></div>
                     <label>Followup Time</label>
                            <select name="FollowUpTime" class="form-control">
                              <option {{$f->FollowUpTime == 'Morning' ? 'selected' : ''}}>Morning</option>
                              <option {{$f->FollowUpTime == 'Afternoon' ? 'selected' : ''}}>Afternoon</option>
                              <option  {{$f->FollowUpTime == 'Evening' ? 'selected' : ''}}>Evening</option>
                            </select>
                      <label>Specific Time</label><input type="text" name="Specifictime" placeholder="Specific Time" class="form-control" value="{{$f->Remarks}}">
                 </div>

                 	<br>
                      <div class="form-group">
               
                  <div class="col-sm-6">
         <button type="submit" class="btn btn-info btn-block">
         Save</button></div>  <div class="col-sm-6"> <a href="{{ url('followup') }}"class="btn btn-danger btn-block">Cancel</a></div>
     
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

                