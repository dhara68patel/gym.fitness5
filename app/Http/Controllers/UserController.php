<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Admin;
use DB;
use Hash;

use App\Employee;

class UserController extends Controller
{	
	 public function index(Request $request)
    {
            // $users = User::get()->all();
     
            $users = Employee::leftjoin('roles','roles.roleid','=','employee.roleid')->get();
         
             // $user = User::find(1);
          
            //$users = Employee::find(1)->role();
          
            
        //   foreach($users as $user){

            return view('admin.users',compact('users'));
    }
     public function create(Request $request)
    {   

          $photo=''; 
          
              if($file = $request->file('file')){
           $file_name = $file->getClientOriginalName();
             $file_size = $file->getClientSize();
             $file->move('images', $file_name);

             $photo = $file_name;
         
       }
          
              $method = $request->method();
               $roles = Role::get()->all();
            if ($request->isMethod('post')){
     
          
                           $request->validate([
          'username' => 'required',
          'Role_id' => 'required',
          'email' => 'required',
          'password' =>'required|max:255|min:6',
          'gender' => 'required',
          'photo' => 'mimes:jpeg,jpg,png,gif|max:20000'
            ]); 

     $usr = Employee::where('username', $request['username'])->get()->all();
    
    if($usr){
      return redirect()->back()->withErrors('User Already exists');
    }
      $role =lcfirst(Role::find($request['Role_id'])->employeerole);
     $password= Hash::make($request['password']);


// employeeid  roleid  username  role  email address city  department  salary  workinghourfrom1  workinghourto1  workinghourfrom2  workinghourto2  dob gender  mobileno  password  photo accountno accountname ifsccode  bankname  branchname  branchcode  status

        $employee=  Employee::create([
            'username' => $request['username'],

               'roleid' => $request['Role_id'],
             'email' => $request['email'],
             'address'=>$request['add'],
             'role'=>$role,
             'city'=>$request['city'],
             'department'=>$request['department'],
             'salary'=>$request['salary'],
			'workinghourfrom1'=>$request['working_hour_from_1'],
			'workinghourto1'=>$request['working_hour_to_1'],
			'workinghourfrom2'=>$request['working_hour_from_2'],
			'workinghourto2'=>$request['working_hour_to_2'],
				
				'dob'=> $request['dob'],
             'gender' => $request['gender'],
             'mobileno' => $request['mobileno'],
              'password' => $request['password'],
              'photo' => $photo,
           
           'accountno' => $request['accountNo'],
           'accountname' => $request['accountName'],
           'ifsccode' => $request['IFSCcode'],
           'bankname' => $request['BankName'],
           'branchname' => $request['BranchName'],
           'branchcode' => $request['BranchCode'],
              ]);
           $user =  new Admin();
           $user->employeeid= $employee->employeeid;
           $user->name = $request['username'];
           $user->username = $request['username'];
           $user->address = $request['add'];
              $user->role =  $role;

                 $user->password = $password;
                    $user->mobileno = $request['mobileno'];
                  $user->save();
       
     
         return redirect('users')->with('message','Succesfully added');
        }
        return view('admin.addUser',compact('roles'));
       
    }
      public function check(Request $request)
    {
      $username=$request->get('username');
       $row=DB::table('admin')->select('username')->where('username','=',$username)->get();

      if(count($row)<=0)
      {
        echo 'unique';
      }
      else
      {
        echo 'not_unique';
      }
    }
    public function edituser($id, Request $request)
    {	
    	$photo;

      $method = $request->method();
     // $role = new role();
     // $course=User::all()->with('role');
      	$roles = Role::get()->all();     // $phone = User::find($id)->role();
        $user= Employee::findOrFail($id);

   
                   if ($request->isMethod('post')){
        $role =lcfirst(Role::find($request['Role_id'])->employeerole);

              
              if(!$request->photo){
               $photo=old('photo', $user->photo);
              }
            	if($file = $request->file('file')){
           $file_name = $file->getClientOriginalName();
             $file_size = $file->getClientSize();
             $file->move('images', $file_name);
             $photo = $file_name;
   			 }

          $user->username = $request->username;
               $user->roleid = $request->Role_id;
             $user->email = $request->email;
             $user->address=$request->add;
             $user->city=$request->city;
             $user->role=$role;
             $user->department=$request->department;
             $user->salary=$request->salary;
			$user->workinghourfrom1=$request->workinghourfrom1;
			$user->workinghourto1=$request->workinghourto1;
			$user->workinghourfrom2=$request->workinghourfrom2;
			$user->workinghourto2=$request->workinghourto2;
				$user->status=$request->status;
				$user->dob= $request->dob;
             $user->gender = $request->gender;
             $user->mobileno = $request->mobileno;
      
             
              $user->photo = $photo;
              $user->save();

                 $auser =  DB::table('admin')->where('employeeid',$user->employeeid)->update(['username' => $request->username,
                  'name'=>$request->username,
                  'address' => $request->add,
                  'role' => $role,
                  'mobileno' => $request->mobileno,]);

              
         
              $users=Employee::get()->all();
         return redirect('users')->with('message','Succesfully Edited',compact('users'));
        }

        return view('admin.editUser', compact('user','roles'));
    }
     public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
         return redirect()->back()->with('message','Succesfully deleted');
    }
}
