@extends('layouts.adminLayout.admin_design')
@section('content')
 <div class="content-wrapper">
   
   
         <section class="content-header"></section>
          <!-- general form elements -->
           <section class="content">
              @if($message = Session::get('message'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
             <div class="row">
                  
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
                        <div class="box-body"><div class="col-lg-5"><h4>Account Details</h4>
               <form role="form" action="{{ url('edituser/'.$user->employeeid) }}"  method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
              <div class="form-group">
              <label>Account No</label>
           

                <input type="text"  readonly="" name="accountNo" class="form-control"placeholder="account no"  class="span11" value="{{ $user->accountno }}" />
              </div>
             <div class="form-group">
              <label>Account Name</label>
             
                <input type="text"  readonly="" name="accountName" class="form-control" placeholder="account name"  class="span11" value="{{ $user->accountname }}" />
              </div>
             <div class="form-group">
              <label>IFSC Code</label>
             
                <input type="text"  readonly="" name="IFSCcode" class="form-control"placeholder="IFSC Code"  class="span11" value="{{$user->ifsccode}}" />
              </div>
             <div class="form-group">
              <label>Bank Name</label>
             
                <input type="text"  readonly="" name="BankName" class="form-control"placeholder="bank name"  class="span11" value="{{$user->bankname}}" />
              </div>
             <div class="form-group">
              <label>Branch Name</label>
             
                <input type="text"  readonly="" name="BranchName" class="form-control"placeholder="branch name"  class="span11" value="{{$user->branchname}}" />
              </div>
             <div class="form-group">
              <label>Branch Code</label>
             
                <input type="text" readonly=""  name="BranchCode" class="form-control"placeholder="branch code"  class="span11" value="{{$user->branchcode}}" />
              </div></div><div class="col-lg-6">
             
                 {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
              <label>Name</label>
              
                <input type="text"class="form-control" placeholder="User name" readonly=""value="{{ $user->username }}" name="username" class="span11"  required/>
              
            </div>
            <div class="form-group">
              <label>Select Role</label>
              
                <select name="Role_id"class="form-control" class="span11"required><option selected disabled="">--Please choose an option--</option>

               
              @foreach($roles as $role)
              <option value="{{ $role->roleid }}" {{ ( $role->roleid == $user->roleid  ) ? 'selected' : '' }}>{{ $role->employeerole }}</option>
              @endforeach

          </select>
             
            </div>
            <div class="form-group">
              <label>Email id</label>
              
                <input type="text"class="form-control" name="email"  value="{{ $user->email }}"  placeholder="Email" class="span11"required />
              
            </div>
                <div class="form-group">
              <label>Address</label>
              
            <textarea rows="2" class="form-control"cols="20" name="add"   wrap="soft" placeholder="Address" class="span11">{{ $user->address }}</textarea>
            
            </div>
       
                <div class="form-group">
              <label>City</label>
                  <select name="city" class="form-control" value="{{ $user->city }}" class="span11">
                     <option selected disabled="">--Please choose an option--</option>
                     <!--  <option  selected value="{{ $user->city }}">{{ $user->city }}</option> -->
              <option value="Rajkot"{{ ( $user->city == 'Rajkot'  ) ? 'selected' : '' }}>Rajkot</option>
               <option  value="Ahemdabad"{{ ( $user->city == 'Ahemdabad'  ) ? 'selected' : '' }}>Ahemdabad</option>
                <option  value="Surat"{{ ( $user->city == 'Surat'  ) ? 'selected' : '' }}>Surat</option>
                 <option  value="Vadodara"{{ ( $user->city == 'Vadodara'  ) ? 'selected' : '' }}>Vadodara</option>
                  <option  value="Jamnagar" {{ ( $user->city == 'Jamnagar'  ) ? 'selected' : '' }}>Jamnagar</option>
                </select>
        
            </div>
              <div class="form-group">
              <label>Department</label>
              
                <input type="text"class="form-control" name="department"value="{{$user->department}}" placeholder="Department" class="span11" />
             
            </div>
                <div class="form-group">
              <label>Salary</label>
               
                <input type="numbe"class="form-control" min="10000"step="5000" name="salary" value="{{ $user->salary}}"placeholder="Salary" class="span11" />

        
            </div>
            <div class="form-group">
              <label>Working hours</label><br>
              Shift 1: From
               <input type="time"class="form-control"name="workinghourfrom1"
                min="9:00 am" max="12:00 pm" class="span8" value="{{$user->workinghourfrom1}}" />
               To
               <input type="time"class="form-control" name="workinghourto1"
                min="9:00 pm" max="12:00 pm" class="span8"value="{{$user->workinghourto1}}" />
              
               Shift 2: From
               <input type="time"class="form-control"name="workinghourfrom2"
                min="9:00 am" max="12:00 pm" class="span8"value="{{$user->workinghourfrom2}}" />
               To
               <input type="time"class="form-control" id="appt" name="workinghourto2"
                min="9:00 pm" max="12:00 pm" class="span8" value="{{$user->workinghourto2}}"/>
       </div>
            
             <div class="form-group">
              <label>Status</label>
              
                  <select name="status"class="form-control"class="span11">
                      <option selected disabled="">--Please choose an option--</option>
                         <!-- <option  selected value="{{ $user->status }}">{{ $user->status }}</option> -->
              <option value="1" {{$user->status == '1' ? 'selected':''}}>Active</option>
               <option value="0" {{$user->status == '0' ? 'selected':''}}>Inactive</option>
                      </select>
          
            </div>
            <div class="form-group">
              <label>Birthdate</label>
              
                <input id="dob" type="date"class="form-control" value="{{$user->dob}}"class="span11" name="dob">
           
            </div>
              <div class="form-group">  <label>Gender</label>
                  
                    <label>
                      <input type="radio" name="gender"  value="female" {{ ( $user->gender == 'female'  ) ? 'checked' : '' }}>
                      Female
                    </label>
                
                    <label>
                      <input type="radio" name="gender"  value="male"{{ ( $user->gender == 'male'  ) ? 'checked' : '' }}>
                      Male
                    </label>
                  </div>
              <div class="form-group">{{$user->photo}}
              <label>Photo</label>
              
                <input type="file"class="form-control" name="file" chosen="wqedqw" value="{{$user->photo}}"class="span11" />
              
            </div>
            <div class="form-group">
              <label>Mobile no</label>
              
              <input type="text"class="form-control number" name="mobileno" placeholder="Mobile_no"value="{{$user->mobileno}}" class="span11" />
             
            </div>
       
             <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-orange margin">
         Update</button>
         <a href="{{ url('users') }}"class="btn bg-red margin">Cancel</a>
        </div>
      </div><!-- Select multiple-->
              </form></div>
            </div>
            <!-- /.box-body -->
          </div>
      
  </section>
</div>
</div>
</div>
@endsection