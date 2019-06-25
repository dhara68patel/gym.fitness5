<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RootScheme;
use App\PaymentType;
use App\Payment;
use App\Member;
use App\Scheme;
use App\AdminMaster;
use App\MemberPackages;
use App\Notify;
use Session;

class PackageController extends Controller
{
     public function packageEdit($id,Request $request)
    {   
          
            $packages = MemberPackages::where('userid',$id)->with('Scheme','User','Member')->get()->all();
          $pa=0;
            if($packages){
                foreach ($packages as  $package) {
                    $pa = Payment::where('userid',$package->userid)->where('mode','=','-')->get()->all();
                }

            return view('admin.packageEdit',compact('packages','pa'));
            }

     return view('admin.packageEdit',compact('packages','pa'));
    }

    public function changedate(Request $request){
        $loginuser = Session::get('username');

      $id= $request->get('id');
      $packageid = $request->get('packageid');
      $newdate = $request->get('newdate');
      $newdatefornotify=\Carbon\Carbon::parse($newdate)->format('d-m-Y'); 

      $newdate=\Carbon\Carbon::parse($newdate)->format('Y-m-d');
      $edit=MemberPackages::find($packageid);

      $olddatefornotify= \Carbon\Carbon::parse($edit->joindate)->format('d-m-Y'); 
      $oldenddatefornotify=\Carbon\Carbon::parse($edit->expiredate)->format('d-m-Y');

      $scheme= Scheme::findOrFail($edit->schemeid);
      $days=$scheme->numberofdays;
      $days=($days-1);

           

      $edit->joindate = $newdate;
       $enddate = strtotime($edit->joindate . '+ '.$days.'days');
      $enddate=\Carbon\Carbon::parse($enddate)->format('Y-m-d');

      $edit->expiredate= $enddate;
      $newenddatefornotify=\Carbon\Carbon::parse($edit->expiredate)->format('d-m-Y');
      $edit->save();

         $notify=Notify::create([
                  
                  'userid'=> $id,
                 'details'=> ''.$loginuser.' changed joindate from '.$olddatefornotify.' to '.$newdatefornotify. ' and  expiredate from '.$oldenddatefornotify.' to '.$newenddatefornotify,
                ]); 
       

      $enddate = $edit->expiredate;
       $enddate=\Carbon\Carbon::parse($enddate)->format('d-m-Y');
      echo $enddate;
                  
    }
        public function changeenddate(Request $request){
          $loginuser = Session::get('username');

      $id= $request->get('id');      
      $packageid = $request->get('packageid');
      $newdate = $request->get('newdate');
      $newdatefornotify= \Carbon\Carbon::parse($newdate)->format('d-m-Y');  
      $newdate=\Carbon\Carbon::parse($newdate)->format('Y-m-d');
      $edit=MemberPackages::find($packageid);
 $olddatefornotify=\Carbon\Carbon::parse($edit->expiredate)->format('d-m-Y');
      $edit->expiredate = $newdate;
      $edit->save();

       $notify=Notify::create([
                  
                  'userid'=> $id,
                 'details'=> ''.$loginuser.' changed expiredate from '.$olddatefornotify.' to '.$newdatefornotify,
                ]); 

      echo $edit;
                  
    }
    
    public function editpackage($id,Request $request)
    {   


         $method = $request->method();
        if ($request->isMethod('post')){
      
           $edit=MemberPackages::find($id);

             $Payment = Payment::where('UserId', $edit->User_id)->where('SchemeID',$edit->Scheme_id)->where('Mode','!=','-')->get()->first(); 
            $Payment->delete();
       $member = User::find($id)->get()->first();

       $MemberId=$member->id;
        $Memberpackages = Memberpackages::create([
          'User_id'=> $id,
          'Scheme_id'=> $request['SchemeID'],
          'Join_date'=> $request['Join_date'],
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
  
       
          if($request->has('CashCredit')){
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
        'ReceiptNo' => $ReceiptNo,
        'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Credit',
        'Remarks' =>  $remark[$n],

        
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
        
     ]);
            return redirect('packageEdit/'.$id)->with('message','Succesfully edited');

     
        }

        $edit=MemberPackages::find($id);
        $useredit=User::where('id',$edit->User_id)->get()->first();
        $member=$useredit->Member;
        $Schemes=Scheme::get()->all();
        $users=User::get()->all();
        $RootScheme = RootScheme::get()->all();
        $PaymentTypes = PaymentType::get()->all();

        $Payment = Payment::where('UserId', $edit->User_id)->where('SchemeID',$edit->Scheme_id)->where('Mode','!=','-')->get();
      
         return view('admin.editpackage',compact('id','edit','users','RootScheme','PaymentTypes','useredit','Schemes','member','Payment'));
    }
  public function assignPackage(Request $request)
    { 
        $method = $request->method();
        
    $username = $request->get('username');
    $MobileNo = $request->get('MobileNo');
             
            
 
      $users=User::get()->all();
      $RootScheme = RootScheme::get()->all();
    $PaymentTypes = PaymentType::get()->all();
   $ReceiptNo = '';
$receipt = Payment::latest()->first();

if($receipt==null){
  $ReceiptNo = '1';
}
elseif($request['ReceiptNo']){
          $ReceiptNo = $request['ReceiptNo'];
         }
else{
  $ReceiptNo = Payment::max('ReceiptNo');
  // $ReceiptNo = $receipt->ReceiptNo+1;

}
 $ReceiptNo = (Payment::max('receiptno')+1);
    $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;

      return view('admin.assignorrenewalpackage',compact('users','tax','RootScheme','PaymentTypes','ReceiptNo'));
    }
     public function getuser(Request $request)
    { 
        $method = $request->method();

      $username = $request->get('username');
      $MobileNo = $request->get('MobileNo');
      $user = User::where('userid','=', $username)->get()->first();
          
      // $Payment2 = Payment::where('UserId',$user->id)->where('Type','Credit')->WhereNull('SchemeID')->get()->first(); 
            $usercase = Member::where('userid',$user->userid)->get()->first();
            $Payment=$usercase->amount;
      echo json_encode($Payment);
    }
    public function getusername(Request $request)
    {   
        $method = $request->method();

            $username = $request->get('username');

            $user = User::where('userid','=', $username)->get()->first();
          
            // $Payment2 = Payment::where('UserId',$user->id)->where('Type','Credit')->WhereNull('SchemeID')->get()->first(); 
   
            echo json_encode($user);
    }

}
