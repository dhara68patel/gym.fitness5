<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Member;
use App\ExerciseProgram;
use DB;
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
use App\Notes;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Inquiry;
use Carbon\Carbon;
use App\Notify;
use PDF;
use Session;


class ProfileController extends Controller
{
  public function IDupload(Request $request){
       
       // dd($request['attachments']);

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
     return redirect()->back();
     
  }
   public function profile($id,Request $request)
    {   

      //         $method = $request->method();
      //       if ($request->isMethod('post')){
      //       	        $request->validate([
    		// 'PaymentType' => 'required',
    		// 'description' => 'max:255',
      //   ]);
      //     PaymentType::create([
      //       'PaymentType' => $request['PaymentType'],
      //        'description' => $request['description'],
      //   ]);
      //    return redirect('paymenttypes')->with('message','Succesfully added');
      //   }
      
 $member = DB::table('member')->select('member.memberid AS mid','member.workinghourfrom AS mworkinghourfrom','member.workinghourto AS mworkinghourto','member.*','users.*','schemes.*','fitnessgoals.*','exerciseprogram.*')
    ->leftJoin('users','member.userid','=','users.userid')
    ->leftJoin('schemes', 'schemes.schemeid', '=', 'users.userid')
    ->leftJoin('fitnessgoals','member.memberid','=','fitnessgoals.memberid')
   ->leftJoin('exerciseprogram','member.memberid','=','exerciseprogram.memberid')
    ->where('member.userid','=',$id)
    ->get()->first();


    $payment = Payment::where('userid',$id)->get()->all();

       
     $packages = MemberPackages::with('Scheme')->where('userid',$member->userid)->get()->all();

     // $pa =  $packages->userid;
      
     // dd($packages[0]->Scheme_id);
       // dd($packages[0]->Scheme->SchemeName);
     $memberid = Member::where('userid',$id)->get()->first();
     $pay = MemberPackages::leftJoin('payments','payments.receiptno','=','memberpackages.memberpackagesid')->where('memberpackages.userid',$id)->get()->all();
         $t= array();
    
foreach ($packages as $key => $value) {
  $a =  Payment::where('userid',$id)->where('schemeid',$value->schemeid)->where('receiptno',$value->memberpackagesid)->latest()->first();
    array_push($t,$a);
}



 //     $t= array();
  
 //     foreach ($pay as $key => $value) {
 //      // echo $key;
 //      // echo $value->Scheme_id;
 //      $a =  Payment::where('userid',$id)->where('schemeid',$value->schemeid)->where('receiptno',$packages->memberpackagesid)->latest()->first();

 //        print_r($a->remainingamount);
 //      if($a->remainingamount){

 //       array_push($t,$a);
 //      }
 //      else{

 //      }
 //     }
 // dd($t);

    $images =  DB::table('files')->where('memberid', $memberid->memberid)->pluck('filename')->first();
    $img='';
    if($images){
        $img=json_decode($images);
    }else{
      $img='';
     }
    $company = Company::get()->all();
    $notes=Notes::where('userid',$id)->get()->all();
    // $fitnessgoals = Fitnessgoals::where('userid',$id)->get()->all();

    $activities = MemberPackages::where('created_at','<', Carbon::now()->subHours(2)->toDateTimeString())->where('userid',$id)->get()->all();
    $notify = Notify::where('userid',$id)->get()->all();

        return view('admin.memberprofile',compact('member','packages','payment','img','company','notes','activities','notify','t'));

       
    }

   
    public function consentform(){
      return view('admin.consentform');
    }

    public function Printconsentform(Request $request){
        
    $pdf = new \App\Printconsentform;
    $pdf->generate($request);

    }
    public function paymentreceipt(Request $request){
        
    $pdf = new \App\paymentreceipt;
    $pdf->generate($request);

    }

  public function paymentforreceiptNo($ReceiptNo){
        
    $pdf = new \App\PaymentforReceiptNo;
    $pdf->generate($ReceiptNo);

    }
}
