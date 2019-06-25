<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use App\Admin;
use App\Member;
use App\Files;
use Illuminate\Support\Facades\Input;
use Session;





class AdminController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('admin.dashboad');
    }

    
    public function dashboard(Request $request){
    
       // $members = member::leftJoin('files','member.id','=','files.Member_id')->where('files.Member_id',NULL)->get()->all(); 
       //  $menu='dashboard';
      return view('admin.dashboard');
     }
  public function check(Request $request){


       if($request->isMethod('post'))
      {
        $admin = DB::table('admin')->select('username','password','role')->get()->all();


        // $password = $admin['3']->password;
        // $username = $admin['3']->username;
        $usernamedata=$request->username;

$u=Admin::where('username', Input::get('username'))->first();

        if ($u) {

          if (Hash::check(Input::get('password'), $u->password)) {

            $role=$u->role;
            session(['username' => $usernamedata]);
            session(['role' =>  $role]);
        //       $user = DB::table('employee')->where('username',$usernamedata)->get()->first();
        // Session::put('user', $user);
  
            return redirect('dashboard');  
           // return response()->json(['success'=>false, 'message' => 'Login successfull']);
          }
          else{
   			    
         // echo ("<SCRIPT LANGUAGE='JavaScript'>
       //  window.alert('Please Enter Valid Details !');
       //     </SCRIPT>");

       //      return view('admin.admin_login');
                $msg = 'Invalid Username or Password';
           // return redirect('check',compact('msg'));
            
                 return redirect('check')->with('message',$msg);
           //echo "you are not admin<br/>";
          }
        }
        else{
           $msg = 'Invalid Username or Password';
           // return redirect('check',compact('msg'));
         
             return redirect('check')->with('message',$msg);
           //echo "you are not admin<br/>";
        }

      }
      return view('admin.admin_login');
    
   }
  public function loginpage(){

    $this->auth=Session::get('role');
    
    $role=['admin','receptionist','manager','trainer'];
        if (in_array($this->auth, $role)) {
            // return abort(403, "No access here, sorry!");
          return redirect('dashboard');
        }
        else
        {
             $msg = 'Invalid Username or Password';
            return view('admin.admin_login')->with('msg');
         
        }

      
    }
 
   
       public function logout(Request $request){
         //auth()->logout();
		Session::flush();
       //return redirect('/check')->with('msgsuccess', 'Succesfully logged out');
		   return redirect('adminloginpage');
     }
}