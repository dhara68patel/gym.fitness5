<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Member;
use App\ExerciseProgram;
use DB;
use App\Notify;
use App\User;
use App\MemberPackages;
use App\Fitnessgoals;
use App\RootScheme;
use App\Scheme;
use App\Payment;
use App\PaymentType;
use App\AdminMaster;
use App\PaymentDetails;
use Illuminate\Support\Facades\Hash;
use App\Company;
use App\Files;
use App\SendCode;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Inquiry;
use Carbon\Carbon;
use App\OTPVerify;
use Mail;
use App\Followup;
use Ixudra\Curl\Facades\Curl;
use App\Notes;


class MemberController extends Controller
{
  public function index(Request $request)
    {
        
      if($request->isMethod('post'))
      {
        if($request->get('username')!="")
        {
          $userid=$request->get('username');
          $members = member::leftJoin('users','member.User_id','=','users.id')->where('member.User_id','=',$userid)->get();
          // dd($members);
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
        }
         elseif($request->get('mobileno')!="")
        {
          $userid=$request->get('mobileno');
          $members = member::leftJoin('users','member.User_id','=','users.id')->where('member.User_id','=',$userid)->get();
          // dd($members);
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
        }
          elseif($request->get('from')!="")
        {
          
            $from = date($request->get('from'));
            if($request->get('to')){
            $to = date($request->get('to'));
            }
            else{
              $to = date('Y-m-d');
            }
        $members = Member::leftJoin('users','member.User_id','=','users.id')->whereBetween('Created_date', [$from, $to])->get();
          // dd($members);
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
        }
         elseif($request->get('keyword')!="")
        {
          $userid=$request->get('keyword');
           $members = Member::leftJoin('users','member.User_id','=','users.id')->where ( 'firstname', 'LIKE', '%' . $userid . '%' )->orWhere ( 'member.email', 'LIKE', '%' . $userid . '%' )->orWhere ( 'lastname', 'LIKE', '%' . $userid . '%' )->orWhere ( 'city', 'LIKE', '%' . $userid . '%' )->get();
             $users = User::get()->all();
            if (count ($members) > 0)
             return view('admin.members',compact('members','users'));
             else
        return view('admin.members',compact('no result found','users'));
      
        //return view('admin.members',compact('members','users'));
        }
      

        $members = member::leftJoin('users','member.User_id','=','users.id')->get();
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
      }

      else
      {
          $members = member::leftJoin('users','member.User_id','=','users.id')->get();
         $users = User::get()->all();
        return view('admin.members',compact('members','users'));
      }
    }

  public function scheme(Request $request)
    {
      $id=$request->get('name');
      $userid=$request->get('id');
      $member=Member::where('User_id',$userid)->get()->first();
      $gender=$member->gender;


 
   
      if($gender=='Female'){

       $row=DB::table('schemes')->select('id','SchemeName','NumberOfDays','Male','Female')->where('Female',1)->where('RootSchemeId','=',$id)->where('validity','>', Carbon::now())->where('status','Active')->get();
      }
      elseif($gender=='Male'){

       $row=DB::table('schemes')->select('id','SchemeName','NumberOfDays','Male','Female')->where('Male',1)->where('RootSchemeId','=',$id)->where('validity','>', Carbon::now())->where('status','Active')->get();
      }
      echo json_encode($row);
    }
    public function idpendingreport(){
             // $members = member::leftJoin('files','member.id','=','files.Member_id')->with('memberpackages')->where('User_id','27')
             // ->where('files.Member_id',NULL)    
             // ->get()->all();
             // $members = DB::select('member.*')->from('member');
              // dd($members);

             $members = DB::select( DB::raw('select * from `member` left join `files` on `member`.`id` = `files`.`Member_id` ,`memberpackages` where `files`.`Member_id` is null and memberpackages.id = (SELECT MAX(memberpackages.id) FROM memberpackages where member.User_id = memberpackages.User_id)')); 
             // dd($results);
            //  $members1 = DB::select( DB::raw('select id from member'));
            //  $ids=array();
            // foreach ($members1 as $m => $member) {
            //    $members2= DB::select( DB::raw('select max(memberpackages.id) as memberid from memberpackages WHERE memberpackages.User_id = '.$member->id));
            //    array_push($ids,$members2);
            // }
            // print_r($ids);exit;
            // foreach ($members2 as $m => $member) {

            //  $members3[]= DB::select( DB::raw('select * from memberpackages WHERE memberpackages.id = '.$member[$m]->memberid));
            // }
            // dd($members3);exit;
            //  foreach ($members as $key => $member) {
            //     echo $member->User_id;
            //    $joiningdate = Memberpackages::where('User_id',$member->User_id)->get();
            //  }
            //   // $joiningdate = Memberpackages::where('User_id',$members->User_id)->get();
            // dd($joiningdate);
            return view('admin.IdPendingReport',compact('members'));
    }
  public function check(Request $request)
    {
      $username=$request->get('username');
       $row=DB::table('users')->select('username')->where('username','=',$username)->get();

      if(count($row)<=0)
      {
        echo 'unique';
      }
      else
      {
        echo 'not_unique';
      }
    }
public function createmember(Request $request){

  $request->get('username');
  $request->get('mobileno');

  $request->get('lastname');
  $password= $request->get('username');
  $row1=User::create([
      'username'=> $request->get('username'),
      'MobileNo'=>   $request->get('mobileno'),
      'password'=>$password,  
      'email'=>$request['email'],
    ]);
  

    $usermember =  Member::create([
      'User_id' => $row1->id,
      'Created_date' =>  $request['Created_date'],
      'lastname' => $request->get('lastname'),
      'firstname' =>  $request->get('firstname'),
      'gender' => $request['gender'],
      'add' => $request['Address'],
      'city' => $request['City'],
      'email' => $request['email'],
      'HearAbout' => $request['hearabout'],
      'FormNo' => $request['FormNo'],
      'HomePhoneNumber' => $request['HomePhoneNumber'],
      'CellPhoneNumber' => $request['CellPhoneNumber'],
      'OfficePhoneNumber' => $request['OfficePhoneNumber'],
      'Profession' => $request['profession'],
      'Birthday' => $request['birthday'],
      'Anniversary' => $request['anniversary'],
      'EmergancyName' => $request['emergancyname'],
      'EmergancyRelation' => $request['emergancyrelation'],
      'EmergancyAddress' => $request['emergancyaddress'],
      'EmergancyPhoneNumber' => $request['EmergancyPhoneNumber'],
      'working_hour_from' => $request['working_hour_from_1'],
      'working_hour_to' => $request['working_hour_to_1'],
      'Company_id' => $request['bycompany'],
      // 'status' => $request['status'], 
      // 'amount' => $request['amount'],
    ]);
    echo $usermember; 

}

public function otpverify(Request $request){

 // $request->get('username');
 //  $request->get('mobileno');

 //  $request->get('lastname');
  $mobileno=$request['CellPhoneNumber'];
  $password= $request->get('username');
   $username=$request->get('username');

    $usr = User::where('username', $request['username'])->orWhere('MobileNo',$request['CellPhoneNumber'])->get()->all();
    
    if($usr){
         $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
$RootScheme = RootScheme::get()->all();
$users = User::get()->all();
$PaymentTypes = PaymentType::get()->all();
$company = Company::get()->all();
return redirect('addMember')->with('message','User Already exists');
     
    }
  
  $row1=User::create([
      'username'=> $request->get('username'),
      'MobileNo'=>   $request['CellPhoneNumber'],
      'password'=>$password,  
      'email'=>$request['email'],
      'active'=>'0',
    ]);
  $mobileno=$request['CellPhoneNumber'];
    $password=$username;
    if(Inquiry::where('Cell',$mobileno)->get()->first()){
     $closeinquiry=Inquiry::where('Cell',$mobileno)->get()->first();
     $closeinquiry->Status = '3';
     $closeinquiry->Reason = 'ConvertedIntoMember';
     $closeinquiry->save(); 
     if(Followup::where('InquiryId',$closeinquiry->id)->get()->all()){

     $followup = Followup::where('InquiryId',$closeinquiry->id)->get()->all();
      foreach($followup as $follow){
        $follow->Status = 'Converted Into Member';
        $follow->Reason = 'Close Inquiry';
        $follow->save();
      }
    }
}


  $todayDate = date("Y-m-d");
    $usermember =  Member::create([
      'User_id' => $row1->id,
      'Created_date' =>  $todayDate,
      'lastname' => $request->get('lastname'),
      'firstname' =>  $request->get('firstname'),
      'gender' => $request['gender'],
      'add' => $request['Address'],
      'city' => $request['City'],
      'email' => $request['email'],
      'HearAbout' => $request['HearAbout'],
      'FormNo' => $request['FormNo'],
      'HomePhoneNumber' => $request['HomePhoneNumber'],
      'CellPhoneNumber' => $request['CellPhoneNumber'],
      'OfficePhoneNumber' => $request['OfficePhoneNumber'],
      'Profession' => $request['profession'],
      'Birthday' => $request['birthday'],
      'Anniversary' => $request['anniversary'],
      'EmergancyName' => $request['emergancyname'],
      'EmergancyRelation' => $request['emergancyrelation'],
      'EmergancyAddress' => $request['emergancyaddress'],
      'EmergancyPhoneNumber' => $request['EmergancyPhoneNumber'],
      'working_hour_from' => $request['working_hour_from_1'],
      'working_hour_to' => $request['working_hour_to_1'],
      'Company_id' => $request['bycompany'],
      // 'status' => $request['status'], 
      // 'amount' => $request['amount'],
    ]);
     $photo=''; 

            if($file = $request->file('file')){
           $file_name = $file->getClientOriginalName();
            $file_size = $file->getClientSize();
           $file->move(public_path().'/files/', $file_name);

           
             $photo = $file_name;
             $usermember->photo= $photo;
             $usermember->save();
           }
            $MemberId = $usermember->id;

         if($request->hasfile('attachments'))
           {
           foreach($request->file('attachments') as $file)
            {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  
        }
           $file = new Files();
           $file->filename=json_encode($data);
           $file->Member_id = $MemberId;
           $file->save();
           }
    $fitnessgoals =  $request->get('fitnessgoals');
    $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
    $i=0;
    $n0=0;
    $n0=count($fitnessgoal);

    Fitnessgoals::create([
      'MemberId' => $usermember->id,
      'OtherHelp'=> $request['OtherHelp'],
      'SpecificGoalsa'=> $request['SpecificGoalsa'],
      'SpecificGoalsb'=> $request['SpecificGoalsb'],
      'SpecificGoalsc'=> $request['SpecificGoalsc'],
    ]);

// }
    if($fitnessgoals!=null){
      $fg1 = Fitnessgoals::first()->getFillable();
      $fg = Fitnessgoals::where('MemberId', $usermember->id)->first();
      $n=0;
      $n=count($fitnessgoals);

      $n1=0;
      $n1 = count($fg1);

      for($i=0; $i<=$n1-2; $i++){
        for($j=0;$j<$n;$j++){
          if($fitnessgoals[$j] == $i){
            $col= $fg1[$i];
            $fg->$col = "1";
            }
          }
        }
      $fg->save();
    }
// *****************************************************  

    $exerciseprograms =  $request->get('exerciseprograms');

    $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
    $i=0;
    $n0=0;
    $n0=count($exerciseprogram);

    ExerciseProgram::create([
      'MemberId' => $usermember->id,
      'OtherActivity'=> $request['OtherActivity'],
      'OftenWeekExercise' =>  $request['OftenWeekExercise'],
    ]);

    if($exerciseprograms!=null){
      $ep1 = ExerciseProgram::get()->first()->getFillable();
      $ep = ExerciseProgram::where('MemberId', $usermember->id)->first();
      $n=0;
      $n = count($exerciseprograms);
      $n1=0;
      $n1 = count($ep1);

      for($i=0; $i<=$n1-2; $i++){
        for($j=0;$j<$n;$j++){
          if($exerciseprograms[$j] == $i){
          $col = $ep1[$i];
          $ep->$col = "1";
          }
        }
      }
      $rank=$request['rank'];
      $goal=$request['goal'];
      if($rank=="h1")
      {
       $rh=1;
      }
      else
      {
        $rh=0;
      }
      if($rank=="m1")
      {
        $rm=1;
      }
      else
      {
        $rm=0;
      }
      if($rank=="l1")
      {
        $rl=1;
      }
      else
      {
        $rl=0;
      }
      if($goal=="v1")
      {
       $gv=1;
      }
      else
      {
       $gv=0;
      }
      if($goal=="s1")
      {
        $gs=1;
      }
      else
      {
        $gs=0;
      }
      if($goal=="b1")
      {
        $gb=1;
      }
      else
      {
        $gb=0;
      }

      $ep->HighPriority=$rh;
      $ep->MediumPriority=$rm;
      $ep->LowPriority=$rl;

      $ep->Very=$gv;
      $ep->Semi=$gs;
      $ep->Barely=$gb;

      $ep->save();
}
     $notify=Notify::create([
      
      'User_id'=> $row1->id,
     'detail'=> 'User has taken Membership',
    ]);
         
  $mobileno=$request['CellPhoneNumber'];
   $email=$request['email'];
      // $email = $request->get('email');

       $rndno=rand(1000, 999999);

        $otpgenerate = [ 
                                    'mobileno'      => $mobileno,
                                    'email'         => $email,
                                    'code'          => $rndno,  
                                    'is_expired'    =>'0',            
                                    'created_at'     => date('Y-m-d  H:i:s'),
                                    'updated_at'     => date('Y-m-d  H:i:s'), 
                                ];

      DB::table('otpverify')->insert($otpgenerate);

       $your = "Your";
       $is = "is:".$rndno;
       $fit = "FITNESS5";
       $otp="OTP";


       $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$your.'+'.$fit.'+'.$otp.'+'.$is.'&route=6')->get(); 

//    $mobileno=$request['CellPhoneNumber'];
//     // $this->request =  $request->all();
//     $rndno=rand(1000, 9999);
// // dd($rndno);

//       $otp=OTPVerify::create([
      
//       'mobileno'=> $mobileno,
//       'email'=>$request['email'],
//      'code'=> $rndno,
//     ]);
//       //$email = $otp->email;
      
//       // $email=$request['email'];
//       $title =  'Otp Verification';

//        $content = 'Your Otp for verification is  ' .$rndno;


//              Mail::send('admin.name', ['title' => $title, 'content' => $content], function ($message)
//                    {

//                     $emailsend = DB::table('otpverify')->select('email')->latest()->first();
//                    $email = $emailsend->email;


//                        $message->from('dhara@weybee.com', 'Weybee');

//                        $message->to($email);



//                    });

            // return response()->json(['message' => 'Request completed']);
      return view('admin.verify')->with('mobileno',$mobileno)->with('message','');
}
public function otpresendverify($mobileno){

   $mobileno = $mobileno;
     $user = User::where('MobileNo',$mobileno)->get()->first();
      $email = $user->email;
  

       $rndno=rand(1000, 999999);

        $otpgenerate = [ 
                                    'mobileno'      => $mobileno,
                                    'email'         => $email,
                                    'code'          => $rndno,  
                                    'is_expired'    =>'0',            
                                    'created_at'     => date('Y-m-d  H:i:s'),
                                    'updated_at'     => date('Y-m-d  H:i:s'), 
                                ];

      DB::table('otpverify')->insert($otpgenerate);

       $your = "Your";
       $is = "is:".$rndno;
       $fit = "FITNESS5";
       $otp="OTP";


       $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$your.'+'.$fit.'+'.$otp.'+'.$is.'&route=6')->get(); 

        return view('admin.verify')->with('mobileno',$mobileno)->with('message',''); 
} 
public function postverify(Request $request){

        $code = $request['otp'];
        // dd($request->MobileNo);

          $q=OTPVerify::where('code',$code)->where('is_expired','!=','1')->where('created_at', '>', 
        Carbon::now()->subMinute(30)->toDateTimeString())->first();
          
        if($q){
          $q->is_expired = 1;
          $q->save();
            if($q){
          echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered');
           </SCRIPT>");
          }
          $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
          $RootScheme = RootScheme::get()->all();
          $users = User::get()->all();
          $PaymentTypes = PaymentType::get()->all();
          $receiptNo = '';
          $receipt = Payment::latest()->first();

          if($receipt==null){
          $receiptNo = '1';
          }
          else{
          $receiptNo = $receipt->ReceiptNo+1;

          }
          $usermember=Member::leftJoin('users','member.User_id','=','users.id')->where('CellPhoneNumber',$request->MobileNo)->get()->first();
          return view('admin.AssignPackage',compact('usermember','users','PaymentTypes','exerciseprogram','RootScheme','receiptNo'));
    
          // dd($this->request);
           // $query1="UPDATE otpverify SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
           // return view('admin.verify')->with('message','User Verified');
        }
        else{
          return view('admin.verify')->with('mobileno',$request->MobileNo)->with('message','Please, try again');
        }
       
}
public function create(Request $request)
{

  $method = $request->method();
  if ($request->isMethod('post'))
  {

    $username=$request->get('username');

    $usr = User::where('username', $request['username'])->orWhere('MobileNo',$request['CellPhoneNumber'])->get()->all();
    
    if($usr){

      return redirect()->back()->with('message','User Already exists');
    }

    
      $mobileno=$request->get('CellPhoneNumber');
    $password=$username;
    if(Inquiry::where('Cell',$mobileno)->get()->first()){
     $closeinquiry=Inquiry::where('Cell',$mobileno)->get()->first();
     $closeinquiry->Status = '3';
     $closeinquiry->Reason = 'ConvertedIntoMember';
     $closeinquiry->save(); 
    }
    $row1=User::create([
      'username'=> $username,
      'MobileNo'=> $mobileno,
      'password'=>$password,  
      'email'=>$request['email'],
    ]);
 

    $usermember =  Member::create([
      'User_id' => $row1->id,
      'Created_date' =>  $request['Created_date'],
      'lastname' => $request['lastname'],
      'firstname' => $request['firstname'],
      'gender' => $request['gender'],
      'add' => $request['Address'],
      'city' => $request['City'],
      'email' => $request['email'],
      'HearAbout' => $request['hearabout'],
      'FormNo' => $request['FormNo'],
      'HomePhoneNumber' => $request['HomePhoneNumber'],
      'CellPhoneNumber' => $request['CellPhoneNumber'],
      'OfficePhoneNumber' => $request['OfficePhoneNumber'],
      'Profession' => $request['profession'],
      'Birthday' => $request['birthday'],
      'Anniversary' => $request['anniversary'],
      'EmergancyName' => $request['emergancyname'],
      'EmergancyRelation' => $request['emergancyrelation'],
      'EmergancyAddress' => $request['emergancyaddress'],
      'EmergancyPhoneNumber' => $request['EmergancyPhoneNumber'],
      'working_hour_from' => $request['working_hour_from_1'],
      'working_hour_to' => $request['working_hour_to_1'],
      'Company_id' => $request['bycompany'],
      // 'status' => $request['status'], 
      // 'amount' => $request['amount'],

    ]);

    $MemberId = $usermember->id;
     $this->validate($request, [

            // 'attachments' => 'required',

            'attachments.*' => 'mimes:doc,pdf,docx,png,jpg,jpeg|max:1024'

    ]);

    if($request->hasfile('attachments'))
     {
        foreach($request->file('attachments') as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  
        }
        
     $file = new Files();
     $file->filename=json_encode($data);
     $file->Member_id = $MemberId;
     $file->save();
     }



    $fitnessgoals =  $request->get('fitnessgoals');
    $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
    $i=0;
    $n0=0;
    $n0=count($fitnessgoal);

    Fitnessgoals::create([
      'MemberId' => $usermember->id,
      'OtherHelp'=> $request['OtherHelp'],
      'SpecificGoalsa'=> $request['SpecificGoalsa'],
      'SpecificGoalsb'=> $request['SpecificGoalsb'],
      'SpecificGoalsc'=> $request['SpecificGoalsc'],
    ]);

// }
    if($fitnessgoals!=null){
      $fg1 = Fitnessgoals::first()->getFillable();
      $fg = Fitnessgoals::where('MemberId', $MemberId)->first();
      $n=0;
      $n=count($fitnessgoals);

      $n1=0;
      $n1 = count($fg1);

      for($i=0; $i<=$n1-2; $i++){
        for($j=0;$j<$n;$j++){
          if($fitnessgoals[$j] == $i){
            $col= $fg1[$i];
            $fg->$col = "1";
            }
          }
        }
      $fg->save();
    }
// *****************************************************  

    $exerciseprograms =  $request->get('exerciseprograms');

    $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
    $i=0;
    $n0=0;
    $n0=count($exerciseprogram);

    ExerciseProgram::create([
      'MemberId' => $MemberId,
      'OtherActivity'=> $request['OtherActivity'],
      'OftenWeekExercise' =>  $request['OftenWeekExercise'],
    ]);

    if($exerciseprograms!=null){
      $ep1 = ExerciseProgram::get()->first()->getFillable();
      $ep = ExerciseProgram::where('MemberId', $MemberId)->first();
      $n=0;
      $n = count($exerciseprograms);
      $n1=0;
      $n1 = count($ep1);

      for($i=0; $i<=$n1-2; $i++){
        for($j=0;$j<$n;$j++){
          if($exerciseprograms[$j] == $i){
          $col = $ep1[$i];
          $ep->$col = "1";
          }
        }
      }
      $rank=$request['rank'];
      $goal=$request['goal'];
      if($rank=="h1")
      {
       $rh=1;
      }
      else
      {
        $rh=0;
      }
      if($rank=="m1")
      {
        $rm=1;
      }
      else
      {
        $rm=0;
      }
      if($rank=="l1")
      {
        $rl=1;
      }
      else
      {
        $rl=0;
      }
      if($goal=="v1")
      {
       $gv=1;
      }
      else
      {
       $gv=0;
      }
      if($goal=="s1")
      {
        $gs=1;
      }
      else
      {
        $gs=0;
      }
      if($goal=="b1")
      {
        $gb=1;
      }
      else
      {
        $gb=0;
      }

      $ep->HighPriority=$rh;
      $ep->MediumPriority=$rm;
      $ep->LowPriority=$rl;

      $ep->Very=$gv;
      $ep->Semi=$gs;
      $ep->Barely=$gb;

      $ep->save();
}

      $user=$row1;
      $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
      $RootScheme = RootScheme::get()->all();
      $users = User::get()->all();
      $PaymentTypes = PaymentType::get()->all();
      $receiptNo = '';
$receipt = Payment::latest()->first();

if($receipt==null){
  $receiptNo = '1';
}
else{
  $receiptNo = $receipt->ReceiptNo+1;

}
      return view('admin.AssignPackage',compact('usermember','user','users','PaymentTypes','exerciseprogram','RootScheme','receiptNo'));
    
    
}
    
$exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
$RootScheme = RootScheme::get()->all();
$users = User::get()->all();
$PaymentTypes = PaymentType::get()->all();
$company = Company::get()->all();
return view('admin.addMember',compact('exerciseprogram','RootScheme','users','PaymentTypes','company'));

}

 public function schemeActualPrice(Request $request)
    {
      $id=$request->get('name');
       $row=DB::table('schemes')->select('id','SchemeName','ActualPrice','BasePrice','NumberOfDays')->where('id','=',$id)->get();

      echo json_encode($row);
    }
    
     public function createPayment(Request $request)
    {   
      
    $method = $request->method();
             
     if ($request->isMethod('post')){
      // dd($request);

        // $lastuserid=User::Max('id')->get()->last();
       
        // $MemberId= $lastuserid->Member->id;
        $id= $request['selectusername'];
     $memberfortimimg = Member::where('User_id',$id)->get()->first();
     $mfrom=$memberfortimimg->working_hour_from;
     $mto=$memberfortimimg->working_hour_to;
    $scheme= Scheme::where('id',$request->SchemeID)->get()->first();
    $sfrom=$scheme->WorkingHourFrom;
    $sto=$scheme->WorkingHourTo;
 if(!($sfrom <= $mfrom &&  $sto >= $mto)){
  // echo 'no'.$sfrom.$mfrom.$sto.$mto;
 return redirect()->back()->with('message', 'Your timing is different from package timimg');
}
        $pay=Payment::where('UserId',$id)->get()->last();
           
         if($pay){
        if($pay->remainingAmount){

  $payment= Payment::where('UserId',$id)->get()->all();
 $member = DB::table('member')
    ->leftJoin('users','member.User_id','=','users.id')
    ->leftJoin('schemes', 'schemes.id', '=', 'users.id')
    ->leftJoin('fitnessgoals','member.id','=','fitnessgoals.MemberId')
   ->leftJoin('exerciseprogram','member.id','=','exerciseprogram.MemberId')
    ->where('member.User_id','=',$id)
    ->get()->first();
       
     $packages = MemberPackages::with('Scheme')->where('User_id',$member->User_id)->get()->all();
  
     $memberid = Member::where('User_id',$id)->get()->first();
     $memberId=$memberid->id;
     $pay = MemberPackages::with('Payment')->where('User_id',$id)->get()->all();
     $t= array();
     foreach ($pay as $key => $value) {
    
      $a=  Payment::where('UserId',$id)->where('SchemeID',$value->Scheme_id)->latest()->first();
      // echo $a;
       array_push($t,$a);
     }


    $images =  DB::table('files')->where('Member_id', $memberid->id)->pluck('filename')->first();
    $img='';
    if($images){
        $img=json_decode($images);
    }else{
      $img='';
     }
    $company = Company::get()->all();
    $notes=Notes::where('User_id',$id)->get()->all();
  
   
    $activities = MemberPackages::where('created_at','<', Carbon::now()->subHours(2)->toDateTimeString())->where('User_id',$id)->get()->all();
    $notify = Notify::where('User_id',$id)->get()->all();


        // return view('admin.memberprofile',compact('member','packages','payment','img','company','notes','activities','notify','t'));
       return redirect('memberProfile/'.$memberid->id)->with('member','packages','payment','img','company','notes','activities','notify','t')->with('message','Please Complete Your Payment');
        // return redirect()->back()->with('message','You Cant Assign Package untill User pay their remaining Amount');
        }
      }
        
       $member = User::findOrFail($id);
       $mem = Member::where('User_id',$member->id)->get()->first();
       $MemberId=$mem->id;
       $schemeid=$request['SchemeID'];
       $schemeassigned=Scheme::where('id',$schemeid)->get()->first();
       $schemename=$schemeassigned->SchemeName;

        if(MemberPackages::where('User_id',$id)->get()->all()){
         $notify=Notify::create([
           'User_id'=> $id,
           'detail'=> 'User has renewal of package',
         ]);  
        
       }
       else{
        $notify=Notify::create([
           'User_id'=> $id,
           'detail'=> 'User has assign a package '.$schemename,
         ]);  
       }

        if(Memberpackages::where('User_id',$id)->where('Scheme_id', $request['SchemeID'])){
            $memberpack = Memberpackages::where('User_id',$id)->where('Scheme_id', $request['SchemeID'])->get()->all();
            foreach($memberpack as $pack){
              $pack->status = 'Inactive';
              $pack->save();
            }
            }
           
        
      	$Memberpackages = Memberpackages::create([
      		'User_id'=> $id,
      		'Scheme_id'=> $request['SchemeID'],
      		'Join_date'=> $request['Join_date'],
          'status' => 'Active',
      		'Expire_date'=> \Carbon\Carbon::parse($request['Expire_date'])->format('Y-m-d'),
      		
      		]);
            

    	// 
     $p=AdminMaster::where('Title','Tax')->get()->first();
  
        $mode= $request['Mode'];
         $remark= $request['Remark'];
         $amount= $request['Amount'];
         $ActualAmount = 0;
          $ReceiptNo = '';
$receipt = Payment::latest()->first();
          if($receipt==null){
  $ReceiptNo = '1';
}
elseif($request['ReceiptNo']){
          $ReceiptNo = $request['ReceiptNo'];
         }
else{
  $ReceiptNo = $receipt->ReceiptNo+1;

}
 $ReceiptNo = (Payment::max('ReceiptNo')+1);
  
          if( $request->has('CashCredit')){
            $payment =  PaymentDetails::create([
              'ReceiptNo' =>  $ReceiptNo,   
              'Amount' =>    $request['CashCredit'],
            ]);
            $member = Member::Where('User_id',$id)->get()->first();
            $member->amount -= $request['CashCredit'];
            $member->save();

          }


        for ($n=0; $n < count($mode) ; $n++) { 

        $ActualAmount += $amount[$n];

         $payment =  Payment::create([
        'MemberId' =>  $MemberId,      
        'UserId' => $id,
        'ActualAmount' =>  $request['ActualAmount'],
        'Amount' =>  $amount[$n],
        'Tax' => $p->description,
        'TaxAmount' => $request['TaxAmount'],
        'Discount' => $request['Discount'],
        'DiscountAmount' => $request['TotalDiscount'],
        'Discount2' => $request['Discount2'],
        'Discount2Amount' => $request['Discount2Amount'],
        'Date' => $request['Date'],
        'PaymentDate' => now(),
        'Mode' => PaymentType::find($request['Mode'][$n])->PaymentType,
        'SchemeID' => $request['SchemeID'],

        'OtherChargesDetailsId' => $request['OtherChargesDetailsId'],
        'ExpenseId' => $request['ExpenseId'],
        'ExpenseDetailsId' => $request['ExpenseDetailsId'],
        'EmployeeId' => $request['EmployeeId'],
        'VoucherId' => $request['VoucherId'],
        'BillId' => $request['BillId'],
        'StoreBillId' => $request['StoreBillId'],
        'ReceiptNo' => $ReceiptNo,
        'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Credit',
        'Remarks' =>  $remark[$n],
         'remainingAmount'=> $request['rtotal'],
          'DueDate' => $request['duedate'],

        
     ]);
       }
       
          $payment =  Payment::create([
        'MemberId' =>  $MemberId,      
        'UserId' => $id,
        'ActualAmount' =>  $request['ActualAmount'],
        'Amount' =>  $ActualAmount,
        'Tax' => $p->description,
        'TaxAmount' => $request['TaxAmount'],
        'Discount' => $request['Discount'],
        'DiscountAmount' => $request['DiscountAmount'],
        'Discount2' => $request['Discount2'],
        'Discount2Amount' => $request['Discount2Amount'],
        'Date' => $request['Date'],
        'PaymentDate' => now(),
        'Mode' =>'-',
        'SchemeID' => $request['SchemeID'],


        'OtherChargesDetailsId' => $request['OtherChargesDetailsId'],
        'ExpenseId' => $request['ExpenseId'],
        'ExpenseDetailsId' => $request['ExpenseDetailsId'],
        'EmployeeId' => $request['EmployeeId'],
        'VoucherId' => $request['VoucherId'],
        'BillId' => $request['BillId'],
        'StoreBillId' => $request['StoreBillId'],
        'ReceiptNo' => $ReceiptNo,
        'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Debit',
        'Remarks' =>  '-',
        'remainingAmount'=> $request['rtotal'],
        'DueDate' => $request['duedate'],
     ]);

          
    
         
        $notify=Notify::create([
      
      'User_id'=> $id,
     'detail'=> 'User has Made a Payment of '.$payment->Amount,
    ]);      

   $method = $request->method();
    $pdf = new \App\Invoice;
    $pdf->generate($request,$payment);
    

 return redirect('members')->with('message','');
}
    
          // $photo=''; 

          //     if($file = $request->file('file')){
          //  $file_name = $file->getClientOriginalName();
          //    $file_size = $file->getClientSize();
          //    $file->move('images', $file_name);

          //    $photo = $file_name;
         
       // } }
          
       //      

     
        //  return redirect('members')->with('message','Succesfully added');
        //$exerciseprogram = DB::table('exerciseprogram')->getColumnListing('id');
        // }
        $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
        $RootScheme = RootScheme::get()->all();
        $users = User::get()->all();
        $PaymentTypes = PaymentType::get()->all();
        return view('admin.AssignPackage',compact('exerciseprogram','RootScheme','users','PaymentTypes','ReceiptNo'));
       
    }
    
     public function edituser(Request $request)
    {
     $id= $request->get('id');

        $usered = User::find($id)->first();
       
      $username=$request->get('username');
      // echo $username;
      $mobileno=$request->get('mobileno');
      $password=$username.$mobileno;
        $usered->username = $username;
        $usered->MobileNo =  $mobileno;
        $usered->password = $password;
        $usered->save();

               // $row1=User::create([
       //              'username'=> $username,
       //              'MobileNo'=> $mobileno,
       //              'password'=>$password     
       //              ]);
       $userid=$usered->id;
       // echo $userid;
    }
    public function editMember($id, Request $request)
    {
      $method = $request->method();
      $useredt=User::findOrFail($id);


      if ($request->isMethod('post'))
      {
          // $Payment = Payment::where('UserId', $id)->get()->all();
          $useredt=User::findOrFail($id);
          $memberedt=$useredt->Member;
          // $memberamount = Payment::where('MemberId',$memberedt->id)->WhereNull('SchemeID')->get()->all();
          
          $username=$request->get('username');
              // echo $username;
          $mobileno=$request->get('CellPhoneNumber');
          $password=$username.$mobileno;
          $useredt->username = $request['username'];
          $useredt->MobileNo = $mobileno;
          $useredt->password = $password;
          $useredt->save();
          echo $useredt->id;
          // $Memberpackages = Memberpackages::where('User_id',$useredt->id)->get()->first();
          // $Memberpackages->Scheme_id=$request['SchemeID'];
          // $Memberpackages->Join_date=$request['Join_date'];
          // $Memberpackages->Expire_date= $request['Expire_date'];
          // $Memberpackages->save();

             
              $memberedt->lastname = $request['lastname'];
              $memberedt->firstname = $request['firstname'];
              $memberedt->gender = $request['gender'];
              $memberedt->add = $request['Address'];
              $memberedt->city = $request['City'];
              $memberedt->email = $request['email'];
              $memberedt->HearAbout = $request['HearAbout'];
              $memberedt->FormNo = $request['FormNo'];
              $memberedt->HomePhoneNumber = $request['HomePhoneNumber'];
              $memberedt->CellPhoneNumber = $request['CellPhoneNumber'];

              $memberedt->OfficePhoneNumber = $request['OfficePhoneNumber'];
              $memberedt->Profession =$request['profession'];
              $memberedt->Birthday =$request['birthday'];
              $memberedt->Anniversary = $request['anniversary'];
              $memberedt->EmergancyName = $request['emergancyname'];
              $memberedt->EmergancyRelation = $request['emergancyrelation'];
              $memberedt->EmergancyAddress = $request['emergancyaddress'];
              $memberedt->EmergancyPhoneNumber = $request['EmergancyPhoneNumber'];
              $memberedt->working_hour_from = $request['working_hour_from_1'];
              $memberedt->working_hour_to = $request['working_hour_to_1'];
               $memberedt->Company_id = $request['bycompany'];
            
              $memberedt->save();

              $fitnessgoals = Fitnessgoals::where('MemberId',$memberedt->id)->get()->first();

              $fitnessgoals->delete();
              $fitnessgoals =  $request->get('fitnessgoals');

              $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
              $i=0;
              $n0=count($fitnessgoal);


              // if($fitnessgoals[$i] > $i) {

              Fitnessgoals::create([
              'MemberId' => $memberedt->id,
              'OtherHelp'=> $request['OtherHelp'],
              'SpecificGoalsa'=> $request['SpecificGoalsa'],
              'SpecificGoalsb'=> $request['SpecificGoalsb'],
              'SpecificGoalsc'=> $request['SpecificGoalsc'],

              ]);

              // }
              if($fitnessgoals!=null){
              $fg1 = Fitnessgoals::where('MemberId', $memberedt->id)->first()->getFillable();
              $fg = Fitnessgoals::where('MemberId', $memberedt->id)->first();
              $n = count($fitnessgoals);
              $n1 = count($fg1);
              // echo $n.'-'.$n1.'--';


              for($i=0; $i<=$n1-2; $i++){
              for($j=0;$j<$n;$j++){

              if($fitnessgoals[$j] == $i){
              // $fg1[$i]['LoseBodyFat'] =  '1';
              $col= $fg1[$i];
              $fg->$col = "1";
              }

              }
              }
              $fg->save();
              }


    $exerciseprograms = ExerciseProgram::where('MemberId',$memberedt->id)->get()->first();
    $exerciseprograms->delete();
    $exerciseprograms =  $request->get('exerciseprograms');
    $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
    $i=0;
    $n0=count($exerciseprogram);

        ExerciseProgram::create([
          'MemberId' => $memberedt->id,
          'OtherActivity'=> $request['OtherActivity'],
          'OftenWeekExercise' =>  $request['OftenWeekExercise'],
        ]);
        if($exerciseprograms!=null){
   $ep1 = ExerciseProgram::get()->first()->getFillable();

  $ep = ExerciseProgram::where('MemberId', $memberedt->id)->first();
  $n=0;
  $n = count($exerciseprograms);
  $n1=0;
  $n1 = count($ep1);
    // echo $n.'-'.$n1.'--';
  for($i=0; $i<=$n1-2; $i++){
    for($j=0;$j<$n;$j++){
      
      if($exerciseprograms[$j] == $i){
        
         $col = $ep1[$i];
         $ep->$col = "1";
    
    }
  }
   }
     $rank=$request['rank'];
     $goal=$request['goal'];

     if($rank=="h1")
     {
       $rh=1;
     }
     else
     {
      $rh=0;
     }
     if($rank=="m1")
     {
       $rm=1;
     }
     else
     {
      $rm=0;
     }
     if($rank=="l1")
     {
       $rl=1;
     }
     else
     {
      $rl=0;
     }

     if($goal=="v1")
     {
       $gv=1;
     }
     else
     {
      $gv=0;
     }
     if($goal=="s1")
     {
       $gs=1;
     }
     else
     {
      $gs=0;
     }
     if($goal=="b1")
     {
       $gb=1;
     }
     else
     {
      $gb=0;
     }

     $ep->HighPriority=$rh;
     $ep->MediumPriority=$rm;
     $ep->LowPriority=$rl;

     $ep->Very=$gv;
     $ep->Semi=$gs;
     $ep->Barely=$gb;

    $ep->save();
  }
  $photo=''; 

            if($file = $request->file('file')){
           $file_name = $file->getClientOriginalName();
            $file_size = $file->getClientSize();
             $file->move(public_path().'/files/', $file_name);
           
             $photo = $file_name;
             $memberedt->photo= $photo;
             $memberedt->save();
           }
  if($request->hasfile('attachments'))
     {
        foreach($request->file('attachments') as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  
        }
      if(Files::where('Member_id',$memberedt->id)->get()->first())  {
        $file = Files::where('Member_id',$memberedt->id)->get()->first();
        $file->filename=json_encode($data);
     $file->Member_id = $memberedt->id;
     $file->save();
      }
      else{
     $file = new Files();
     $file->filename=json_encode($data);
     $file->Member_id = $memberedt->id;
     $file->save();
     }
     }

      return redirect()->back();

 // }
 
}
}
//   $users = User::get()->all();
// $useredit  = User::find($id);
//  $member=$useredit->Member;
//  $RootScheme = RootScheme::get()->all();
//  $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
// return view('admin.editMember',compact('id','useredit','member','exerciseprogram','RootScheme','users'));


//     public function editMember($id, Request $request)
//     {
//       $method = $request->method();
//       $useredt=User::findOrFail($id);

//       if ($request->isMethod('post'))
//       {
//           // $Payment = Payment::where('UserId', $id)->get()->all();
//           $useredt=User::findOrFail($id);
//           $memberedt=$useredt->Member;
//           // $memberamount = Payment::where('MemberId',$memberedt->id)->WhereNull('SchemeID')->get()->all();
//           $memamount = 0;
//           foreach ($memberamount as $key => $memberamount) {
//           $memamount  +=  $memberamount->Amount;
//           }
//           $username=$request->get('username');
//               // echo $username;
//           $mobileno=$request->get('CellPhoneNumber');
//           $password=$username.$mobileno;
//           $useredt->username = $request['username'];
//           $useredt->MobileNo = $mobileno;
//           $useredt->password = $password;
//           $useredt->save();
//           echo $useredt->id;
//           // $Memberpackages = Memberpackages::where('User_id',$useredt->id)->get()->first();
//           // $Memberpackages->Scheme_id=$request['SchemeID'];
//           // $Memberpackages->Join_date=$request['Join_date'];
//           // $Memberpackages->Expire_date= $request['Expire_date'];
//           // $Memberpackages->save();

//               $memberedt->Created_date =  $request['Created_date'];
//               $memberedt->lastname = $request['lastname'];
//               $memberedt->firstname = $request['firstname'];
//               $memberedt->gender = $request['gender'];
//               $memberedt->add = $request['Address'];
//               $memberedt->city = $request['City'];
//               $memberedt->email = $request['email'];
//               $memberedt->HearAbout = $request['hearabout'];
//               $memberedt->FormNo = $request['FormNo'];
//               $memberedt->HomePhoneNumber = $request['HomePhoneNumber'];
//               $memberedt->CellPhoneNumber = $request['CellPhoneNumber'];

//               $memberedt->OfficePhoneNumber = $request['OfficePhoneNumber'];
//               $memberedt->Profession =$request['profession'];
//               $memberedt->Birthday =$request['birthday'];
//               $memberedt->Anniversary = $request['anniversary'];
//               $memberedt->EmergancyName = $request['emergancyname'];
//               $memberedt->EmergancyRelation = $request['emergancyrelation'];
//               $memberedt->EmergancyAddress = $request['emergancyaddress'];
//               $memberedt->EmergancyPhoneNumber = $request['EmergancyPhoneNumber'];
//               $memberedt->working_hour_from = $request['working_hour_from_1'];
//               $memberedt->working_hour_to = $request['working_hour_to_1'];
//               $memberedt->amount = $memamount;
//               $memberedt->save();

//               $fitnessgoals = Fitnessgoals::where('MemberId',$memberedt->id)->get()->first();

//               $fitnessgoals->delete();
//               $fitnessgoals =  $request->get('fitnessgoals');

//               $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
//               $i=0;
//               $n0=count($fitnessgoal);


//               // if($fitnessgoals[$i] > $i) {

//               Fitnessgoals::create([
//               'MemberId' => $memberedt->id,
//               'OtherHelp'=> $request['OtherHelp'],
//               'SpecificGoalsa'=> $request['SpecificGoalsa'],
//               'SpecificGoalsb'=> $request['SpecificGoalsb'],
//               'SpecificGoalsc'=> $request['SpecificGoalsc'],

//               ]);

//               // }
//               if($fitnessgoals!=null){
//               $fg1 = Fitnessgoals::where('MemberId', $memberedt->id)->first()->getFillable();
//               $fg = Fitnessgoals::where('MemberId', $memberedt->id)->first();
//               $n = count($fitnessgoals);
//               $n1 = count($fg1);
//               // echo $n.'-'.$n1.'--';


//               for($i=0; $i<=$n1-2; $i++){
//               for($j=0;$j<$n;$j++){

//               if($fitnessgoals[$j] == $i){
//               // $fg1[$i]['LoseBodyFat'] =  '1';
//               $col= $fg1[$i];
//               $fg->$col = "1";
//               }

//               }
//               }
//               $fg->save();
//               }


//     $exerciseprograms = ExerciseProgram::where('MemberId',$memberedt->id)->get()->first();
//     $exerciseprograms->delete();
//     $exerciseprograms =  $request->get('exerciseprograms');
//     $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
//     $i=0;
//     $n0=count($exerciseprogram);

//         ExerciseProgram::create([
//           'MemberId' => $memberedt->id,
//           'OtherActivity'=> $request['OtherActivity'],
//           'OftenWeekExercise' =>  $request['OftenWeekExercise'],
//         ]);
//         if($exerciseprograms!=null){
//    $ep1 = ExerciseProgram::get()->first()->getFillable();

//   $ep = ExerciseProgram::where('MemberId', $memberedt->id)->first();
//   $n=0;
//   $n = count($exerciseprograms);
//   $n1=0;
//   $n1 = count($ep1);
//     // echo $n.'-'.$n1.'--';
//   for($i=0; $i<=$n1-2; $i++){
//     for($j=0;$j<$n;$j++){
      
//       if($exerciseprograms[$j] == $i){
        
//          $col = $ep1[$i];
//          $ep->$col = "1";
    
//     }
//   }
//    }
//      $rank=$request['rank'];
//      $goal=$request['goal'];

//      if($rank=="h1")
//      {
//        $rh=1;
//      }
//      else
//      {
//       $rh=0;
//      }
//      if($rank=="m1")
//      {
//        $rm=1;
//      }
//      else
//      {
//       $rm=0;
//      }
//      if($rank=="l1")
//      {
//        $rl=1;
//      }
//      else
//      {
//       $rl=0;
//      }

//      if($goal=="v1")
//      {
//        $gv=1;
//      }
//      else
//      {
//       $gv=0;
//      }
//      if($goal=="s1")
//      {
//        $gs=1;
//      }
//      else
//      {
//       $gs=0;
//      }
//      if($goal=="b1")
//      {
//        $gb=1;
//      }
//      else
//      {
//       $gb=0;
//      }

//      $ep->HighPriority=$rh;
//      $ep->MediumPriority=$rm;
//      $ep->LowPriority=$rl;

//      $ep->Very=$gv;
//      $ep->Semi=$gs;
//      $ep->Barely=$gb;

//     $ep->save();
//   }
//       return redirect()->to('packageEdit/'.$id);
//  // }
 
// }
//   $users = User::get()->all();
// $useredit  = User::find($id);
//  $member=$useredit->Member;
//  $RootScheme = RootScheme::get()->all();
//  $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
// return view('admin.editMember',compact('id','useredit','member','exerciseprogram','RootScheme','users'));

// }

public function editPayment($id,Request $request)
  {
    if ($request->isMethod('post'))
    {
      $payment = Payment::where('MemberId',$memberedt->id)->WhereNotNull('SchemeID')->get()->all();
      foreach($payment as $payment){
      $payment->delete();
      }
 
      $p=AdminMaster::where('Title','Tax')->get()->first();
      $mode= $request['Mode'];
      $remark= $request['Remark'];
      $amount= $request['Amount'];
      $ActualAmount = 0;
      $ReceiptNo =  Payment::max('ReceiptNo')+1;


        for ($n=0; $n < count($mode) ; $n++) { 

        $ActualAmount += $amount[$n];

         $payment =  Payment::create([
        'MemberId' => $memberedt->id,      
        'UserId' => $id,
        'ActualAmount' => $request['ActualAmount'],
        'Amount' =>  $amount[$n],
        'Tax' => $p->description,
        'TaxAmount' => $request['TaxAmount'],
        'Discount' => $request['Discount'],
        'DiscountAmount' => $request['DiscountAmount'],
        'Discount2' => $request['Discount2'],
        'Discount2Amount' => $request['Discount2Amount'],
        'Date' => $request['Date'],
        'PaymentDate' => now(),
        'Mode' => $request['Mode'][$n],
        'SchemeID' => $request['SchemeID'],

        'OtherChargesDetailsId' => $request['OtherChargesDetailsId'],
        'ExpenseId' => $request['ExpenseId'],
        'ExpenseDetailsId' => $request['ExpenseDetailsId'],
        'EmployeeId' => $request['EmployeeId'],
        'VoucherId' => $request['VoucherId'],
        'BillId' => $request['BillId'],
        'StoreBillId' => $request['StoreBillId'],
        'ReceiptNo' => $ReceiptNo ,
        'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Credit',
        'Remarks' =>  $remark[$n],
        
     ]);
       
        }
          $payment =  Payment::create([
        'MemberId' =>  $memberedt->id,      
        'UserId' => $id,
        'ActualAmount' =>  $request['ActualAmount'],
        'Amount' =>  $ActualAmount,
        'Tax' => $p->description,
        'TaxAmount' => $request['TaxAmount'],
        'Discount' => $request['Discount'],
        'DiscountAmount' => $request['DiscountAmount'],
        'Discount2' => $request['Discount2'],
        'Discount2Amount' => $request['Discount2Amount'],
        'Date' => $request['Date'],
        'PaymentDate' => now(),
        'Mode' =>'-',
        'SchemeID' => $request['SchemeID'],

        'OtherChargesDetailsId' => $request['OtherChargesDetailsId'],
        'ExpenseId' => $request['ExpenseId'],
        'ExpenseDetailsId' => $request['ExpenseDetailsId'],
        'EmployeeId' => $request['EmployeeId'],
        'VoucherId' => $request['VoucherId'],
        'BillId' => $request['BillId'],
        'StoreBillId' => $request['StoreBillId'],
        'ReceiptNo' =>  $ReceiptNo ,
        'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Debit',
        'Remarks' =>  '-',
        
     ]);
         $amount= $request['CashCreditcheck'];
    
           $member = Member::Where('User_id',$id)->get()->first();
        // $MemberId = $UserId->Member->id;
       $member->amount -=  $amount;
       $member->amount = abs($member->amount);
       $member->save();
      if(Payment::where('UserId',$id)->whereNull('SchemeID')->get()->first()){
        $pay = Payment::where('UserId',$id)->whereNull('SchemeID')->get()->first();
      }
      else
        $pay=0;
       

       if($pay > 0){
        $Paymentdetails = PaymentDetails::where('ReceiptNo',$pay->ReceiptNo)->get()->first();
       $Paymentdetails->Amount=$amount;
        $Paymentdetails->save();
       }
        
         return redirect('members')->with('message','Succesfully Edited');
        } 
        else
        {
          $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
              $RootScheme = RootScheme::get()->all();
              $users = User::get()->all();
              $PaymentTypes = PaymentType::get()->all();
               $member=Member::where('User_id',$id)->get()->first();
              $useredit  = User::find($id);
              $member=$useredit->Member;
             $Schemes=Scheme::get()->all();
             // dd($member->Payment->Amount[0]);
                 // dd($useredit->MemberPackages->Scheme);
             
              $Payment = Payment::where('UserId', $id)->get()->all();
            $Payments = Payment::where('UserId', $id)->get()->all();
              $CashCredit=0;
            foreach ($Payments as $key => $p) {
             $CashCredit = PaymentDetails::where('ReceiptNo',$p->ReceiptNo)->pluck('amount')->last();
            }
               // $CashCredit += PaymentDetails::where('ReceiptNo',$Payment->ReceiptNo)->pluck('amount')->first();
         
            return view('admin.editMember',compact('id','useredit','member','Payment','exerciseprogram','RootScheme','users','PaymentTypes','Schemes','CashCredit'));
          }
        }

}
