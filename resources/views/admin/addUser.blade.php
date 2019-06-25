@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add User</h2></section>
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
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="col-lg-5"><h4>Account Details</h4> <form action="{{ url('addUser') }}" method="post" enctype="multipart/form-data">  {{ csrf_field() }}
              <div class="form-group">
              <label>Account No</label>
             
                <input type="text"  name="accountNo" class="form-control"placeholder="account no"  class="span11" />
              </div>
             <div class="form-group">
              <label>Account Name</label>
             
                <input type="text"  name="accountName" class="form-control"placeholder="account name"  class="span11" />
              </div>
             <div class="form-group">
              <label>IFSC Code</label>
             
                <input type="text"  name="IFSCcode" class="form-control"placeholder="IFSC Code"  class="span11" />
              </div>
             <div class="form-group">
              <label>Bank Name</label>
             
                <input type="text"  name="BankName" class="form-control"placeholder="bank name"  class="span11" />
              </div>
             <div class="form-group">
              <label>Branch Name</label>
             
                <input type="text"  name="BranchName" class="form-control"placeholder="branch name"  class="span11" />
              </div>
             <div class="form-group">
              <label>Branch Code</label>
             
                <input type="text"  name="BranchCode" class="form-control"placeholder="branch code"  class="span11" />
              </div></div>
              <div class="col-lg-6">
             
                <div class="form-group">
              <label>User Name</label>
             
                <input type="text"  id="username" name="username" class="form-control"placeholder="User name" required class="span11" /><span id="error_username"></span>
              </div>
            
            <div class="form-group">
             <label>Select Role</label>
             
                <select name="Role_id"  class="form-control"class="span11"><option selected disabled="">--Please choose an option--</option>@foreach($roles as $role)
              <option value="{{ $role->roleid }}">{{ $role->employeerole }}</option>@endforeach
          </select>
              </div>
           
            <div class="form-group">
             <label>Email Id</label>
             
                <input type="email" name="email" class="form-control" placeholder="Email"  required class="span11" />
               </div>
           
                <div class="form-group">
             <label>Address</label>
             
            <textarea rows="2" cols="20" name="add" wrap="soft" class="form-control" placeholder="Address" class="span11"></textarea>
               </div>
           
                <div class="form-group">
             <label>City</label>
             
                  <select name="city" class="form-control" class="span11">
                     <option selected disabled="">--Please choose an option--</option>
              <option value="Rajkot">Rajkot</option>
               <option  value="Ahemdabad">Ahemdabad</option>
                <option  value="Surat">Surat</option>
                 <option  value="Vadodara">Vadodara</option>
                  <option  value="Jamnagar">Jamnagar</option>
                </select>
              
            </div>
                   <div class="form-group">
             <label>Department</label>
             
                <input type="text" name="department" class="form-control" placeholder="Department" class="span11" />
               </div>
                <div class="form-group">
             <label>Salary</label>
             
                <input type="number" class="form-control" min="10000"step="5000" name="salary" placeholder="Salary" class="span8" />
             
            </div>
            
              <div class="form-group">
             <label>Working hours</label><br>
             <span><label> Shift 1: From</label></span>
             <input type="time" class="form-control"  name="working_hour_from_1"
                min="9:00 am" max="12:00 pm" value="09:30" required />
                  
             <label>To</label> 
                <input type="time" class="form-control"  name="working_hour_to_1"
                min="9:00 pm" default="09:pm" max="12:00 pm"value="11:30" required />
          
              <label>Shift 2: From</label>
               <input type="time" class="form-control"  name="working_hour_from_2"
                min="9:00 am" max="12:00 pm"value="09:30"required/>
            <label>To</label> 
                <input type="time"class="form-control"  name="working_hour_to_2"
                min="9:00 pm" max="12:00 pm"value="11:30" required/>
              
           </div>
             <!-- <div class="form-group">
             <label>Status</label>
             
                  <select name="status"class="form-control"class="span11">
                      <option selected disabled="">--Please choose an option--</option>
              <option value="Active">Active</option>
               <option value="Inactive">Inactive</option>
                      </select>
               
            </div> -->
            <div class="form-group">
             <label>Birthdate</label>
             
                <input placeholder="Birthdate" type="date" class="form-control" name="dob" requiredclass="span11">
            
            </div>
            <div class="form-group">  <label>Gender</label>
                  
                    <label>
                      <input type="radio" name="gender"  value="female" checked="">
                      Female
                    </label>
                
                    <label>
                      <input type="radio" name="gender"  value="male">
                      Male
                    </label>
                  </div>
       
              <div class="form-group">
             <label>Photo</label>
             
                <input type="file" name="file"class="form-control"  class="span11" />
               </div>
           
            <div class="form-group">
             <label>Mobile No</label>
             
              <input type="text" name="mobileno" class="form-control number" required placeholder="Mobile no" class="span11" minlength="10" maxlength="10"  />
              
            </div>
            <div class="form-group">
             <label>Password</label>
             <span>Note: Minimum 6 characters are required</span>
             
              <input type="password" name="password" class="form-control" required  placeholder="Password"class="span11" minlength="6" />
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                  <div class="col-sm-6">
         <button type="submit" class="btn btn-info btn-block">
         Save</button></div> <div class="col-sm-6">
          <a href="{{ url('users') }}"class="btn btn-danger">Cancel</a></div>
        </div>
      </div>
              </form>  
            </div>
            </div></div>
            <!-- /.box-body -->
        
  </section>
</div>
</div>
</div>
<script type="text/javascript">
 $('#username').on('keyup',function(){

   
    
   var error_username = '';
    var username = $('#username').val();
    var _token = $('input[name="_token"]').val();

     $.ajax({
      url:"{{ route('UserController.check') }}",
      method:"POST",
      data:{username:username, _token:_token},
      success:function(result)
      {
       if(result == 'unique')
       {
        $('#error_username').html('<label class="text-success">User Name is Valid</label>');
        $('#username').removeClass('has-error');
        $('#firstbtn').attr('disabled', false);
       }
       else
       {
        // alert("hi1");
        $('#error_username').html('<label class="text-danger">User Name is Already Exist</label>');
        $('#username').addClass('has-error');
        $('#firstbtn').attr('disabled', 'disabled');
       }
      }
     })
   });
 </script>
@endsection