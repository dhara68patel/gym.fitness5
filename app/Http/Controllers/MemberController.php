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
use App\Biomatric;
use Session;


class MemberController extends Controller
{
  public function index(Request $request)
    {
         

      if($request->isMethod('post'))
      {
        

        if($request->get('username')!="")
        {
          $userid=$request->get('username');
          $members = member::leftJoin('users','member.userid','=','users.userid')->where('member.userid','=',$userid)->get();
          // dd($members);
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
        }
        elseif($request->get('mobileno')!="")
        {
          $userid=$request->get('mobileno');
          $members = member::leftJoin('users','member.userid','=','users.userid')->where('member.userid','=',$userid)->get();
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
        $members = Member::leftJoin('users','member.userid','=','users.userid')->whereBetween('createddate', [$from, $to])->get();
          // dd($members);
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
        }
         elseif($request->get('keyword')!="")
        {
          $userid=$request->get('keyword');
           $members = Member::leftJoin('users','member.userid','=','users.userid')->where ( 'firstname', 'LIKE', '%' . $userid . '%' )->orWhere ( 'member.email', 'LIKE', '%' . $userid . '%' )->orWhere ( 'lastname', 'LIKE', '%' . $userid . '%' )->orWhere ( 'city', 'LIKE', '%' . $userid . '%' )->get();
             $users = User::get()->all();
            if (count ($members) > 0)
             return view('admin.members',compact('members','users'));
             else
              $members ='';
        return view('admin.members',compact('members','users'));
      
        //return view('admin.members',compact('members','users'));
        }
      

        $members = member::leftJoin('users','member.userid','=','users.userid')->get();
        $users = User::get()->all();
        return view('admin.members',compact('members','users'));
      }

      else
      {
          $members = member::leftJoin('users','member.userid','=','users.userid')->get();
         $users = User::get()->all();
        return view('admin.members',compact('members','users'));
      }
    }

  public function scheme(Request $request)
    {
      $id=$request->get('name');
      $userid=$request->get('id');
      $member=Member::where('userid',$userid)->get()->first();
      $gender=$member->gender;


 
   
      if($gender=='Female'){

       $row=DB::table('schemes')->select('schemeid','schemename','numberofdays','male','female')->where('female',1)->where('rootschemeid','=',$id)->where('validity','>', Carbon::now())->where('status','1')->get();
      }
      elseif($gender=='Male'){

       $row=DB::table('schemes')->select('schemeid','schemename','numberofdays','male','female')->where('male',1)->where('rootschemeid','=',$id)->where('validity','>', Carbon::now())->where('status','1')->get();
      }
      echo json_encode($row);
    }
    public function idpendingreport(){
             // $members = member::leftJoin('files','member.id','=','files.Member_id')->with('memberpackages')->where('userid','27')
             // ->where('files.Member_id',NULL)    
             // ->get()->all();
             // $members = DB::select('member.*')->from('member');
              // dd($members);

             $members = DB::select( DB::raw('select * from `member` left join `files` on `member`.`memberid` = `files`.`memberid` ,`memberpackages` where `files`.`memberid` is null and memberpackages.memberpackagesid = (SELECT MAX(memberpackages.memberpackagesid) FROM memberpackages where member.userid = memberpackages.userid)')); 
             // dd($results);
            //  $members1 = DB::select( DB::raw('select id from member'));
            //  $ids=array();
            // foreach ($members1 as $m => $member) {
            //    $members2= DB::select( DB::raw('select max(memberpackages.id) as memberid from memberpackages WHERE memberpackages.userid = '.$member->id));
            //    array_push($ids,$members2);
            // }
            // print_r($ids);exit;
            // foreach ($members2 as $m => $member) {

            //  $members3[]= DB::select( DB::raw('select * from memberpackages WHERE memberpackages.id = '.$member[$m]->memberid));
            // }
            // dd($members3);exit;
            //  foreach ($members as $key => $member) {
            //     echo $member->userid;
            //    $joiningdate = Memberpackages::where('userid',$member->userid)->get();
            //  }
            //   // $joiningdate = Memberpackages::where('userid',$members->userid)->get();
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
      public function checkmobile(Request $request)
    {
      $usermobile=$request->get('usermobile');
       $row=DB::table('users')->select('mobileno')->where('mobileno','=',$usermobile)->get();

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
      'userid' => $row1->id,
      'createddate' =>  $request['Created_date'],
      'lastname' => $request->get('lastname'),
      'firstname' =>  $request->get('firstname'),
      'gender' => $request['gender'],
      'address' => $request['Address'],
      'city' => $request['City'],
      'email' => $request['email'],
      'hearabout' => $request['hearabout'],
      'formno' => $request['FormNo'],
      'homephonenumber' => $request['HomePhoneNumber'],
      'mobileno' => $request['CellPhoneNumber'],
      'officephonenumber' => $request['OfficePhoneNumber'],
      'profession' => $request['profession'],
      'birthday' => $request['birthday'],
      'anniversary' => $request['anniversary'],
      'emergancyname' => $request['emergancyname'],
      'emergancyrelation' => $request['emergancyrelation'],
      'emergancyaddress' => $request['emergancyaddress'],
      'emergancyphonenumber' => $request['EmergancyPhoneNumber'],
      'workinghourfrom' => $request['working_hour_from_1'],
      'workinghourto' => $request['working_hour_to_1'],
      'companyid' => $request['bycompany'],
      // 'status' => $request['status'], 
      // 'amount' => $request['amount'],
    ]);
    echo $usermember; 

}

public function otpverify(Request $request){
   if ($request->isMethod('post'))
    {
    
 $request->validate([
              'CellPhoneNumber' => 'required|max:11|min:10',
              'lastname' => 'required|max:255',
              'firstname' => 'required',
              'gender' =>'required',
              'file' => 'mimes:jpeg,bmp,png|max:2000',
             'attachments.*' => 'mimes:jpeg,bmp,png|max:2000',
              ]);



  $mobileno=$request['CellPhoneNumber'];
  $password= $request->get('username');
   $username=$request->get('username');

    $usr = User::where('username', $request['username'])->orWhere('mobileno',$request['CellPhoneNumber'])->get()->all();
    
    if($usr){
         $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
$RootScheme = RootScheme::get()->all();
$users = User::get()->all();
$PaymentTypes = PaymentType::get()->all();
$company = Company::get()->all();
return redirect('addMember')->with('message','User Already exists');
     
    }
	  

  $mobileno=$request['CellPhoneNumber'];
    $password=$username;
    if(Inquiry::where('mobileno',$mobileno)->get()->first()){
     $closeinquiry=Inquiry::where('mobileno',$mobileno)->get()->first();
     $closeinquiry->status = '3';
     $closeinquiry->reason = 'Converted Into Member';
     $closeinquiry->save();     

     $followup = Followup::where('inquiryid',$closeinquiry->inquiryid)->get()->all();

      foreach($followup as $follow){
        $follow->status = '2';
        $follow->reason = 'Converted Into Member';
        $follow->save();
      }
    
}
 
  $row1=User::create([
      'username'=> $request->get('username'),
      'mobileno'=>   $request['CellPhoneNumber'],
      'password'=>$password,  
      'email'=>$request['email'],
      'active'=>'1',
    ]);
  $todayDate = date("Y-m-d");
    $usermember =  Member::create([
      'userid' => $row1->userid,
      'createddate' =>  $todayDate,
      'lastname' => $request->get('lastname'),
      'firstname' =>  $request->get('firstname'),
      'gender' => $request['gender'],
      'address' => $request['Address'],
      'city' => $request['City'],
      'email' => $request['email'],
      'hearabout' => $request['HearAbout'],
      'formno' => $request['FormNo'],
      'homephonenumber' => $request['HomePhoneNumber'],
      'mobileno' => $request['CellPhoneNumber'],
      'officephonenumber' => $request['OfficePhoneNumber'],
      'profession' => $request['profession'],
      'birthday' => $request['birthday'],
      'anniversary' => $request['anniversary'],
      'emergancyname' => $request['emergancyname'],
      'emergancyrelation' => $request['emergancyrelation'],
      'emergancyaddress' => $request['emergancyaddress'],
      'emergancyphonenumber' => $request['EmergancyPhoneNumber'],
      'workinghourfrom' =>  Carbon::parse($request['working_hour_from_1']),
      'workinghourto' => Carbon::parse($request['working_hour_to_1']),
      'companyid' => $request['bycompany'],
      'bloodgroup'=>$request['bloodgroup'],

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
            $MemberId = $usermember->memberid;

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
           $file->memberid = $MemberId;
           $file->save();
           }
    $fitnessgoals =  $request->get('fitnessgoals');
    $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
    $i=0;
    $n0=0;
    $n0=count($fitnessgoal);

    Fitnessgoals::create([
      'memberid' => $usermember->memberid,
      'otherhelp'=> $request['OtherHelp'],
      'specificgoalsa'=> $request['SpecificGoalsa'],
      'specificgoalsb'=> $request['SpecificGoalsb'],
      'specificgoalsc'=> $request['SpecificGoalsc'],
    ]);

// }
    if($fitnessgoals!=null){
      $fg1 = Fitnessgoals::get()->first()->getFillable();
      $fg = Fitnessgoals::where('memberid', $usermember->memberid)->first();
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
      'memberid' => $usermember->memberid,
      'otheractivity'=> $request['OtherActivity'],
      'oftenweekexercise' =>  $request['OftenWeekExercise'],
    ]);

    if($exerciseprograms!=null){
      $ep1 = ExerciseProgram::get()->first()->getFillable();
      $ep = ExerciseProgram::where('memberid', $usermember->memberid)->first();
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

      $ep->highpriority=$rh;
      $ep->mediumpriority=$rm;
      $ep->lowpriority=$rl;

      $ep->very=$gv;
      $ep->semi=$gs;
      $ep->barely=$gb;

      $ep->save();
}
     $notify=Notify::create([
      
      'userid'=> $row1->userid,
     'details'=> 'User has taken Membership',
    ]);

      $mem = Member::where('mobileno',$mobileno)->get()->first();
      $fname=$mem->firstname;
      $lname=$mem->lastname;
      $msg=   DB::table('messages')->where('messagesid','2')->get()->first();


      $msg =$msg->message;

      $msg = str_replace("[FirstName]",$fname,$msg);
      $msg= str_replace("[LastName]",$lname,$msg);

      $memberi= Member::where('mobileno',$mobileno)->get()->first();
      $memberid=$memberi->memberid;



      $nmd = [

      'mobileno' => $memberid,
      'smsmsg' => $msg,
      'mailmsg' => '0',
      'callnotes' => '0',
      ];

      $msg = urlencode($msg);

      $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$msg.'&route=6')->get(); 

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
            $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;
          $usermember=Member::leftJoin('users','member.userid','=','users.userid')->where('member.mobileno',$mobileno)->get()->first();

          return view('admin.AssignPackage',compact('usermember','users','PaymentTypes','exerciseprogram','RootScheme','receiptNo','tax'));
    

      }
 $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
$RootScheme = RootScheme::get()->all();
$users = User::get()->all();
$PaymentTypes = PaymentType::get()->all();
$company = Company::get()->all();
return view('admin.addMember',compact('exerciseprogram','RootScheme','users','PaymentTypes','company'));
}

public function otpresendverify($mobileno){

   $mobileno = $mobileno;
     $user = User::where('mobileno',$mobileno)->get()->first();
      $email = $user->email;
  

       $rndno=rand(1000, 999999);

        $otpgenerate = [ 
                                    'mobileno'      => $mobileno,
                                    'email'         => $email,
                                    'code'          => $rndno,  
                                    'isexpired'    =>'0',            
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

          $q=OTPVerify::where('code',$code)->where('isexpired','!=','1')->where('created_at', '>', 
        Carbon::now()->subMinute(30)->toDateTimeString())->first();

          $mobileno =$request->MobileNo;
        
        if($q){
          $q->isexpired = 1;
          $q->save();
            if($q){
          echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered');
           </SCRIPT>");
          
           $r = "<script>document.write(p);</script>";
      
$mem = Member::where('mobileno',$mobileno)->get()->first();
$fname=$mem->firstname;
$lname=$mem->lastname;
 $msg=   DB::table('messages')->where('messagesid','2')->get()->first();


 $msg =$msg->message;

$msg = str_replace("[FirstName]",$fname,$msg);
$msg= str_replace("[LastName]",$lname,$msg);

  $memberi= DB::table('member')->select('memberid')->get()->last();
      $memberid=$memberi->memberid;
  


                $nmd = [

                            'mobileno' => $memberid,
                            'smsmsg' => $msg,
                            'mailmsg' => '0',
                            'callnotes' => '0',
                        ];

$msg = urlencode($msg);

    $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$msg.'&route=6')->get(); 

DB::table('notoficationmsgdetails')->insert($nmd);


          
          }

// $r = "<script>document.write(p);</script>";



// if($r == true){

// echo $r;
// exit;
// $y="welcome";
//    $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$y.'&route=6')->get(); 

// }

// else{
//   return false;
// }


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
          $receiptNo = $receipt->receiptno+1;

          }
            $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;
          $usermember=Member::leftJoin('users','member.userid','=','users.userid')->where('member.mobileno',$request->MobileNo)->get()->first();
          return view('admin.AssignPackage',compact('usermember','users','PaymentTypes','exerciseprogram','RootScheme','receiptNo','tax'));
    
         
        }
        else{
          return view('admin.verify')->with('mobileno',$request->MobileNo)->with('message','Please, try again');
        }
       
}

// public function create(Request $request)
// {

//   $method = $request->method();
//   if ($request->isMethod('post'))
//   {

//     $username=$request->get('username');

//     $usr = User::where('username', $request['username'])->orWhere('MobileNo',$request['CellPhoneNumber'])->get()->all();
    
//     if($usr){

//       return redirect()->back()->with('message','User Already exists');
//     }

    
//       $mobileno=$request->get('CellPhoneNumber');
//     $password=$username;
//     if(Inquiry::where('Cell',$mobileno)->get()->first()){
//      $closeinquiry=Inquiry::where('Cell',$mobileno)->get()->first();
//      $closeinquiry->Status = '3';
//      $closeinquiry->Reason = 'ConvertedIntoMember';
//      $closeinquiry->save(); 
//     }
//     $row1=User::create([
//       'username'=> $username,
//       'MobileNo'=> $mobileno,
//       'password'=>$password,  
//       'email'=>$request['email'],
//     ]);
 

//     $usermember =  Member::create([
//       'userid' => $row1->id,
//       'Created_date' =>  $request['Created_date'],
//       'lastname' => $request['lastname'],
//       'firstname' => $request['firstname'],
//       'gender' => $request['gender'],
//       'add' => $request['Address'],
//       'city' => $request['City'],
//       'email' => $request['email'],
//       'HearAbout' => $request['hearabout'],
//       'FormNo' => $request['FormNo'],
//       'HomePhoneNumber' => $request['HomePhoneNumber'],
//       'CellPhoneNumber' => $request['CellPhoneNumber'],
//       'OfficePhoneNumber' => $request['OfficePhoneNumber'],
//       'Profession' => $request['profession'],
//       'Birthday' => $request['birthday'],
//       'Anniversary' => $request['anniversary'],
//       'EmergancyName' => $request['emergancyname'],
//       'EmergancyRelation' => $request['emergancyrelation'],
//       'EmergancyAddress' => $request['emergancyaddress'],
//       'EmergancyPhoneNumber' => $request['EmergancyPhoneNumber'],
//       'working_hour_from' => $request['working_hour_from_1'],
//       'working_hour_to' => $request['working_hour_to_1'],
//       'Company_id' => $request['bycompany'],
//       // 'status' => $request['status'], 
//       // 'amount' => $request['amount'],

//     ]);

//     $MemberId = $usermember->id;
//      $this->validate($request, [

//             // 'attachments' => 'required',

//             'attachments.*' => 'mimes:doc,pdf,docx,png,jpg,jpeg|max:1024'

//     ]);

//     if($request->hasfile('attachments'))
//      {
//         foreach($request->file('attachments') as $file)
//         {
//             $name=$file->getClientOriginalName();
//             $file->move(public_path().'/files/', $name);  
//             $data[] = $name;  
//         }
        
//      $file = new Files();
//      $file->filename=json_encode($data);
//      $file->Member_id = $MemberId;
//      $file->save();
//      }



//     $fitnessgoals =  $request->get('fitnessgoals');
//     $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
//     $i=0;
//     $n0=0;
//     $n0=count($fitnessgoal);

//     Fitnessgoals::create([
//       'MemberId' => $usermember->id,
//       'OtherHelp'=> $request['OtherHelp'],
//       'SpecificGoalsa'=> $request['SpecificGoalsa'],
//       'SpecificGoalsb'=> $request['SpecificGoalsb'],
//       'SpecificGoalsc'=> $request['SpecificGoalsc'],
//     ]);

// // }
//     if($fitnessgoals!=null){
//       $fg1 = Fitnessgoals::first()->getFillable();
//       $fg = Fitnessgoals::where('MemberId', $MemberId)->first();
//       $n=0;
//       $n=count($fitnessgoals);

//       $n1=0;
//       $n1 = count($fg1);

//       for($i=0; $i<=$n1-2; $i++){
//         for($j=0;$j<$n;$j++){
//           if($fitnessgoals[$j] == $i){
//             $col= $fg1[$i];
//             $fg->$col = "1";
//             }
//           }
//         }
//       $fg->save();
//     }
// // *****************************************************  

//     $exerciseprograms =  $request->get('exerciseprograms');

//     $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
//     $i=0;
//     $n0=0;
//     $n0=count($exerciseprogram);

//     ExerciseProgram::create([
//       'MemberId' => $MemberId,
//       'OtherActivity'=> $request['OtherActivity'],
//       'OftenWeekExercise' =>  $request['OftenWeekExercise'],
//     ]);

//     if($exerciseprograms!=null){
//       $ep1 = ExerciseProgram::get()->first()->getFillable();
//       $ep = ExerciseProgram::where('MemberId', $MemberId)->first();
//       $n=0;
//       $n = count($exerciseprograms);
//       $n1=0;
//       $n1 = count($ep1);

//       for($i=0; $i<=$n1-2; $i++){
//         for($j=0;$j<$n;$j++){
//           if($exerciseprograms[$j] == $i){
//           $col = $ep1[$i];
//           $ep->$col = "1";
//           }
//         }
//       }
//       $rank=$request['rank'];
//       $goal=$request['goal'];
//       if($rank=="h1")
//       {
//        $rh=1;
//       }
//       else
//       {
//         $rh=0;
//       }
//       if($rank=="m1")
//       {
//         $rm=1;
//       }
//       else
//       {
//         $rm=0;
//       }
//       if($rank=="l1")
//       {
//         $rl=1;
//       }
//       else
//       {
//         $rl=0;
//       }
//       if($goal=="v1")
//       {
//        $gv=1;
//       }
//       else
//       {
//        $gv=0;
//       }
//       if($goal=="s1")
//       {
//         $gs=1;
//       }
//       else
//       {
//         $gs=0;
//       }
//       if($goal=="b1")
//       {
//         $gb=1;
//       }
//       else
//       {
//         $gb=0;
//       }

//       $ep->HighPriority=$rh;
//       $ep->MediumPriority=$rm;
//       $ep->LowPriority=$rl;

//       $ep->Very=$gv;
//       $ep->Semi=$gs;
//       $ep->Barely=$gb;

//       $ep->save();
// }

//       $user=$row1;
//       $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
//       $RootScheme = RootScheme::get()->all();
//       $users = User::get()->all();
//       $PaymentTypes = PaymentType::get()->all();
//       $receiptNo = '';
// $receipt = Payment::latest()->first();

// if($receipt==null){
//   $receiptNo = '1';
// }
// else{
//   $receiptNo = $receipt->ReceiptNo+1;

// }
//       return view('admin.AssignPackage',compact('usermember','user','users','PaymentTypes','exerciseprogram','RootScheme','receiptNo'));
    
    
// }
    
// $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
// $RootScheme = RootScheme::get()->all();
// $users = User::get()->all();
// $PaymentTypes = PaymentType::get()->all();
// $company = Company::get()->all();
// return view('admin.addMember',compact('exerciseprogram','RootScheme','users','PaymentTypes','company'));

// }

 public function schemeActualPrice(Request $request)
    {
      $id=$request->get('name');
       $row=DB::table('schemes')->select('schemeid','schemename','actualprice','baseprice','numberofdays')->where('schemeid','=',$id)->get();

      echo json_encode($row);
    }
    
     public function createPayment(Request $request)
    {   
        $loginuser = Session::get('username');
    $method = $request->method();
             
     if ($request->isMethod('post')){

      // dd($request);

        // $lastuserid=User::Max('id')->get()->last();
       
        // $MemberId= $lastuserid->Member->id;
        $id= $request['selectusername'];
     $memberfortimimg = Member::where('userid',$id)->get()->first();
      $mfrom =  date("H:i", strtotime($memberfortimimg->workinghourfrom));
 $mto =  date("H:i", strtotime($memberfortimimg->workinghourto));
    

     $scheme='';
    $scheme= Scheme::where('schemeid',$request->SchemeID)->get()->first();
    if($scheme){
   
 $sfrom =  date("H:i", strtotime($scheme->workinghourfrom));
 $sto =  date("H:i", strtotime($scheme->workinghourto));



 if(!($sfrom <= $mfrom &&  $sto >= $mto)){
  // echo 'no'.$sfrom.$mfrom.$sto.$mto;
 return redirect('memberProfile/'.$id)->with('message', 'Your timing is different from package timimg');
}
}
        $pay=Payment::where('userid',$id)->get()->last();
           
         if($pay){
        if($pay->remainingamount){

  $payment= Payment::where('userid',$id)->get()->all();
 $member = DB::table('member')->select('member.memberid AS mid','member.*','users.*','schemes.*','fitnessgoals.*','exerciseprogram.*')
    ->leftJoin('users','member.userid','=','users.userid')
    ->leftJoin('schemes', 'schemes.schemeid', '=', 'users.userid')
    ->leftJoin('fitnessgoals','member.memberid','=','fitnessgoals.memberid')
   ->leftJoin('exerciseprogram','member.memberid','=','exerciseprogram.memberid')
    ->where('member.userid','=',$id)
    ->get()->first();
       
     $packages = MemberPackages::with('Scheme')->where('userid',$member->userid)->get()->all();
  
     $memberid = Member::where('userid',$id)->get()->first();
     $memberId=$memberid->memberid;
     $mobileno =$memberid->mobileno; 
     $pay = MemberPackages::leftJoin('payments','payments.receiptno','=','memberpackages.memberpackagesid')->where('memberpackages.userid',$id)->get()->all();
         $t= array();
foreach ($packages as $key => $value) {
  $a =  Payment::where('userid',$id)->where('schemeid',$value->schemeid)->where('receiptno',$value->memberpackagesid)->latest()->first();
    array_push($t,$a);
}


    $images =  DB::table('files')->where('memberid', $memberid->memberid)->pluck('filename')->first();
    $img='';
    if($images){
        $img=json_decode($images);
    }else{
      $img='';
     }
    $company = Company::get()->all();
    $notes=Notes::where('userid',$id)->get()->all();
  
   
    $activities = MemberPackages::where('created_at','<', Carbon::now()->subHours(2)->toDateTimeString())->where('userid',$id)->get()->all();
    $notify = Notify::where('userid',$id)->get()->all();


        // return view('admin.memberprofile',compact('member','packages','payment','img','company','notes','activities','notify','t'));
       return redirect('memberProfile/'.$memberid->memberid)->with('member','packages','payment','img','company','notes','activities','notify','t')->with('message','Please Complete Your Payment');
        // return redirect()->back()->with('message','You Cant Assign Package untill User pay their remaining Amount');
        }
      }
        if(Memberpackages::where('userid',$id)->where('schemeid', $request['SchemeID'])){
            $memberpack = Memberpackages::where('userid',$id)->where('schemeid', $request['SchemeID'])->get()->all();

            foreach($memberpack as $pack){

              if(!( $request['Join_date'] > $pack->expiredate)){
                  return redirect()->back()->with('message','You Cant  assign  same package untill its not completed');
                  }
             
                 }
            }
           
        
       $member = User::findOrFail($id);
       $mem = Member::where('userid',$member->userid)->get()->first();
       $mobileno=$mem->mobileno;
       $MemberId=$mem->memberid;
       $schemeid=$request['SchemeID'];
       $schemeassigned=Scheme::where('schemeid',$schemeid)->get()->first();
       $schemename=$schemeassigned->schemename;

        if(MemberPackages::where('userid',$id)->get()->all()){
         $notify=Notify::create([
           'userid'=> $id,
           'details'=> 'User has renewal of package',
         ]);  
        
       }
       else{
        $notify=Notify::create([
           'userid'=> $id,
           'details'=> 'User has assign a package '.$schemename,
         ]);  
       }

      
        
      	$Memberpackages = Memberpackages::create([
      		'userid'=> $id,
      		'schemeid'=> $request['SchemeID'],
      		'joindate'=> $request['Join_date'],
          'status' => '1',
      		'expiredate'=> \Carbon\Carbon::parse($request['Expire_date'])->format('Y-m-d'),
      		
      		]);
            

    	// 
         $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;
  
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
  $ReceiptNo = $receipt->receiptno+1;

}
 $ReceiptNo = (Payment::max('receiptno')+1);
  
          if( $request->has('CashCredit')){
            $payment =  PaymentDetails::create([
              'ReceiptNo' =>  $ReceiptNo,   
              'Amount' =>    $request['CashCredit'],
            ]);
            $member = Member::Where('userid',$id)->get()->first();
            $member->amount -= $request['CashCredit'];
            $member->save();

          }

        if(!$mode){
          $mode = array();
          array_push($mode, 'no mode');

         $payment =  Payment::create([
        'memberid' =>  $MemberId,      
        'userid' => $id,
        'actualamount' =>  $request['ActualAmount'],
        'amount' =>  $ActualAmount,
        'tax' =>   $tax ,
        'taxAmount' => $request['TaxAmount'],
        'discount' => $request['Discount'],
        'discountamount' => $request['DiscountAmount'],
        'discount2' => $request['Discount2'],
        'discount2amount' => $request['Discount2Amount'],
        'date' => $request['Date'],
        'paymentdate' => now(),
        'mode' =>'-',
        'schemeid' => $request['SchemeID'],


        'otherchargesdetailsid' => $request['OtherChargesDetailsId'],
        'expenseid' => $request['ExpenseId'],
        'expensedetailsid' => $request['ExpenseDetailsId'],
        'employeeid' => $request['EmployeeId'],
        'voucherid' => $request['VoucherId'],
        'billid' => $request['BillId'],
        'storebillid' => $request['StoreBillId'],
        'receiptno' => $ReceiptNo,
        'employeesalaryid' => $request['EmployeeSalaryId'],
        'type' => 'Debit',
        'remarks' =>  'no mode',
        'remainingamount'=> $request['rtotal'],
        'duedate' => $request['duedate'],
     ]);

         $request['Mode']='no mode';
        }
        else{
       
        for ($n=0; $n < count($mode) ; $n++) { 

        $ActualAmount += $amount[$n];

         $payment =  Payment::create([
        'memberid' =>  $MemberId,      
        'userid' => $id,
        'actualamount' =>  $request['ActualAmount'],
        'amount' =>  $amount[$n],
        'tax' =>   $tax ,
        'taxamount' => $request['TaxAmount'],
        'discount' => $request['Discount'],
        'discountamount' => $request['TotalDiscount'],
        'discount2' => $request['Discount2'],
        'discount2amount' => $request['Discount2Amount'],
        'date' => $request['Date'],
        'paymentdate' => now(),
        'mode' => PaymentType::find($request['Mode'][$n])->paymenttype,
        'schemeid' => $request['SchemeID'],

        'otherchargesdetailsid' => $request['OtherChargesDetailsId'],
        'expenseid' => $request['ExpenseId'],
        'expensedetailsid' => $request['ExpenseDetailsId'],
        'employeeid' => $request['EmployeeId'],
        'voucherid' => $request['VoucherId'],
        'billid' => $request['BillId'],
        'storebillid' => $request['StoreBillId'],
        'receiptno' => $ReceiptNo,
        'employeesalaryid' => $request['EmployeeSalaryId'],
        'type' => 'Credit',
        'remarks' =>  $remark[$n],
         'remainingamount'=> $request['rtotal'],
          'duedate' => $request['duedate'],

        
     ]);
       }
       
          $payment =  Payment::create([
        'memberid' =>  $MemberId,      
        'userid' => $id,
        'actualamount' =>  $request['ActualAmount'],
        'amount' =>  $ActualAmount,
        'tax' =>   $tax ,
        'taxamount' => $request['TaxAmount'],
        'discount' => $request['Discount'],
        'discountamount' => $request['DiscountAmount'],
        'discount2' => $request['Discount2'],
        'discount2amount' => $request['Discount2Amount'],
        'date' => $request['Date'],
        'paymentdate' => now(),
        'mode' =>'-',
        'schemeid' => $request['SchemeID'],
        'otherchargesdetailsid' => $request['OtherChargesDetailsId'],
        'expenseid' => $request['ExpenseId'],
        'expensedetailsid' => $request['ExpenseDetailsId'],
        'employeeid' => $request['EmployeeId'],
        'voucherid' => $request['VoucherId'],
        'billid' => $request['BillId'],
        'storebillid' => $request['StoreBillId'],
        'receiptno' => $ReceiptNo,
        'employeesalaryid' => $request['EmployeeSalaryId'],
        'type' => 'Debit',
        'remarks' =>  '-',
        'remainingamount'=> $request['rtotal'],
        'duedate' => $request['duedate'],
     ]);

        }  
         


$mem = Member::where('mobileno',$mobileno)->get()->first();
$pack=Scheme::where('schemeid',$Memberpackages->schemeid)->get()->first();
$pack=$pack->schemename;
          $fname=$mem->firstname;
          $lname=$mem->lastname;

          $fname=$fname . ' ' . $lname;
          $id=$mem->memberid;
         
          $joindate=$Memberpackages->joindate;
        
         $joindate = date("d-m-Y", strtotime($joindate));
          $enddate=$Memberpackages->expiredate;
           $enddate= date("d-m-Y", strtotime($enddate));
          $amnt=$payment->amount;
          $InvoiceID=$payment->receiptno;
          $TransactionType='Fully';
          $duedate='';
          $dueamnt='';
          if($payment->duedate){
            $duedate=$payment->duedate;
            $duedate= date("d-m-Y", strtotime($duedate));
            $dueamnt=$payment->remainingamount;
            $TransactionType='Partially';
          }

 $msg=   DB::table('messages')->where('messagesid','13')->get()->first();

  
          $msg =$msg->message;
          $msg = str_replace("[Name of Member]",$fname,$msg);
          $msg= str_replace("[ID]",$id,$msg);
          $msg= str_replace("[Name of Packge]",$pack,$msg);
          $msg= str_replace("[Fully/Partially]",$TransactionType,$msg);
          $msg= str_replace("100",$amnt,$msg);
          $msg= str_replace("[join date]",$joindate,$msg);
          $msg= str_replace("[End Date]", $enddate,$msg);
          $msg= str_replace("[InvoiceID]",$InvoiceID,$msg); 
         
          $due='';
          if($TransactionType == 'Partially'){
            $due="Due Amount:[Due Amount] Next Due Date: [Due Date]";
            $due= str_replace("[Due Amount]",$dueamnt,$due);
          $due= str_replace("[Due Date]", $duedate,$due);
        
            $msg=''.$msg.''.$due.'';
          }
            $memberi= DB::table('member')->select('memberid')->get()->last();
            $memberid=$memberi->memberid;
     
          
                $nmd = [

                            'mobileno' => $mobileno,
                            'smsmsg' => $msg,
                            'mailmsg' => '0',
                            'callnotes' => '0',
                        ];

           // $nmd = [

           //                  'inquiryid' => $memberid,
           //                  'smsmsg' => $msg,
           //                  'mailmsgid' => '0',
           //                  'callnoteid' => '0',
           //              ];

 $msg = urlencode($msg);
          // $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$msg.'&route=6')->get(); 

           DB::table('notoficationmsgdetails')->insert($nmd);
       
        

         
        $notify=Notify::create([
      
      'userid'=> $id,
     'details'=> ''.$loginuser.' take payment of user '.$payment->amount,
    ]);

          $summry = array("firstname"=>$fname, "joindate"=>$joindate,   
                  "enddate"=>$enddate, "amnt"=>$amnt,  "InvoiceID"=>$InvoiceID, "TransactionType"=>$TransactionType, "duedate"=>$duedate,  
                  "dueamnt"=>$dueamnt,"pack"=>$pack);


          return view('admin.summry')->with('summry',$summry);

    // $method = $request->method();
    // $pdf = new \App\Invoice;
    // $pdf->generate($request,$payment);

 // return redirect('members')->with('message','');
}
   $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;

        $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprogram');
        $RootScheme = RootScheme::get()->all();
        $users = User::get()->all();
        $PaymentTypes = PaymentType::get()->all();

        return view('admin.AssignPackage',compact('exerciseprogram','RootScheme','users','PaymentTypes','ReceiptNo','tax'));
       
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
         $request->validate([
              'CellPhoneNumber' => 'required|max:11|min:10',
              'lastname' => 'required|max:255',
              'firstname' => 'required',
              'gender' =>'required',
              'file' => 'mimes:jpeg,bmp,png|max:2000',
              'attachments.*' => 'mimes:jpeg,bmp,png|max:2000',
              ]);

          // $Payment = Payment::where('UserId', $id)->get()->all();
          $useredt=User::findOrFail($id);
          $memberedt=$useredt->Member;
          // $memberamount = Payment::where('MemberId',$memberedt->id)->WhereNull('SchemeID')->get()->all();
          
          $username=$request->get('username');
              // echo $username;
          $mobileno=$request->get('CellPhoneNumber');
          $password=$username.$mobileno;
          $useredt->username = $request['username'];
          $useredt->mobileno = $mobileno;
          $useredt->password = $password;
          $useredt->save();
          echo $useredt->userid;
          // $Memberpackages = Memberpackages::where('userid',$useredt->id)->get()->first();
          // $Memberpackages->Scheme_id=$request['SchemeID'];
          // $Memberpackages->Join_date=$request['Join_date'];
          // $Memberpackages->Expire_date= $request['Expire_date'];
          // $Memberpackages->save();

             
              $memberedt->lastname = $request['lastname'];
              $memberedt->firstname = $request['firstname'];
              $memberedt->gender = $request['gender'];
              $memberedt->address= $request['Address'];
              $memberedt->city = $request['City'];
              $memberedt->email = $request['email'];
              $memberedt->hearabout = $request['HearAbout'];
              $memberedt->bloodgroup = $request['bloodgroup'];
              $memberedt->formno = $request['FormNo'];
              $memberedt->homephonenumber = $request['HomePhoneNumber'];
              $memberedt->mobileno = $request['CellPhoneNumber'];

              $memberedt->officephonenumber = $request['OfficePhoneNumber'];
              $memberedt->profession =$request['profession'];
              $memberedt->birthday =$request['birthday'];
              $memberedt->anniversary = $request['anniversary'];
              $memberedt->emergancyname = $request['emergancyname'];
              $memberedt->emergancyrelation = $request['emergancyrelation'];
              $memberedt->emergancyaddress = $request['emergancyaddress'];
              $memberedt->emergancyphonenumber = $request['EmergancyPhoneNumber'];
              $memberedt->workinghourfrom =  Carbon::parse($request['working_hour_from_1']);
              $memberedt->workinghourto =  Carbon::parse($request['working_hour_to_1']);
               $memberedt->companyid = $request['bycompany'];
            
              $memberedt->save();

              $fitnessgoals = Fitnessgoals::where('memberid',$memberedt->memberid)->get()->first();

              $fitnessgoals->delete();
              $fitnessgoals =  $request->get('fitnessgoals');

              $fitnessgoal = DB::getSchemaBuilder()->getColumnListing('fitnessgoals');
              $i=0;
              $n0=count($fitnessgoal);


              // if($fitnessgoals[$i] > $i) {

              Fitnessgoals::create([
              'memberid' => $memberedt->memberid,
              'otherhelp'=> $request['OtherHelp'],
              'specificgoalsa'=> $request['SpecificGoalsa'],
              'specificgoalsb'=> $request['SpecificGoalsb'],
              'specificgoalsc'=> $request['SpecificGoalsc'],

              ]);

              // }
              if($fitnessgoals!=null){
              $fg1 = Fitnessgoals::where('memberid', $memberedt->memberid)->first()->getFillable();
              $fg = Fitnessgoals::where('memberid', $memberedt->memberid)->first();
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


    $exerciseprograms = ExerciseProgram::where('memberid',$memberedt->memberid)->get()->first();
    $exerciseprograms->delete();
    $exerciseprograms = $request->get('exerciseprograms');
    $exerciseprogram = DB::getSchemaBuilder()->getColumnListing('exerciseprograms');
    $i=0;
    $n0=count($exerciseprogram);

        ExerciseProgram::create([
          'memberid' => $memberedt->memberid,
          'otheractivity'=> $request['OtherActivity'],
          'oftenweekexercise' =>  $request['OftenWeekExercise'],
        ]);
        if($exerciseprograms!=null){
   $ep1 = ExerciseProgram::get()->first()->getFillable();

  $ep = ExerciseProgram::where('memberid', $memberedt->memberid)->first();
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

     $ep->highpriority=$rh;
     $ep->mediumpriority=$rm;
     $ep->lowpriority=$rl;

     $ep->very=$gv;
     $ep->semi=$gs;
     $ep->barely=$gb;

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
      if(Files::where('memberid',$memberedt->memberid)->get()->first())  {
        $file = Files::where('memberid',$memberedt->memberid)->get()->first();
        $file->filename=json_encode($data);
     $file->memberid = $memberedt->memberid;
     $file->save();
      }
      else{
     $file = new Files();
     $file->filename=json_encode($data);
     $file->memberid = $memberedt->memberid;
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
//           // $Memberpackages = Memberpackages::where('userid',$useredt->id)->get()->first();
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
    
           $member = Member::Where('userid',$id)->get()->first();
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
               $member=Member::where('userid',$id)->get()->first();
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
