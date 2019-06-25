<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\PaymentType;
use App\Payment;
use App\AdminMaster;
use App\Member;
use App\Scheme;
use Dompdf\Dompdf;
use App\Notify;
use App\MemberPackages;
use DB;
use Ixudra\Curl\Facades\Curl;
use Session;
class PaymentController extends Controller
{

   public function invoice(Request $request) {
  $method = $request->method();

    $pdf = new \App\Invoice;
    $pdf->generate($request);

}
// }public function invoice() {
//     $pdf = new \App\Invoice;
//     $output = $pdf->generate();
//     $headers = [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'attachment; filename="invoice.pdf"';
//     ];
//     return response($output)->withHeaders($headers);
// }
    public function remainingpayment($id,Request $request){
        $method = $request->method();
            if ($request->isMethod('post')){
            $loginuser = Session::get('username');           
         $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
     $tax =  $sgst + $cgst;
                    
               $userid = $request['Userid'];
                   $mode= $request['Mode'];
         $remark= $request['Remark'];
         $amount= $request['Amount'];
         $ActualAmount = 0;
               $member = Member::where('userid',$userid)->get()->first();
               $mobileno=$member->mobileno;
               $MemberId = $member->memberid;
                for ($n=0; $n < count($mode) ; $n++) { 

                    $ActualAmount += $amount[$n];

                     $payment =  Payment::create([
                    'memberid' =>  $MemberId,      
                    'userid' => $userid,
                    'actualamount' =>  $request['ActualAmount'],
                    'amount' =>  $amount[$n],
                    'tax' => $tax,
                    'taxamount' => $request['TaxAmount'],
                    'discount' => $request['Discount'],
                    'discountAmount' => $request['TotalDiscount'],
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
                    'receiptno' =>  $request['RecieptNo'],
                    'employeesalaryid' => $request['EmployeeSalaryId'],
                    'Type' => 'Credit',
                    'Remarks' =>  $remark[$n],
                     'remainingamount'=> $request['rtotal'],
                     'duedate'=>$request['duedate']

                    
                 ]);
                   }
                   
                      $payment =  Payment::create([
                    'memberid' =>  $MemberId,      
                    'userid' => $userid,
                    'actualamount' =>  $request['ActualAmount'],
                    'amount' =>  $ActualAmount,
                    'tax' => $tax,
                    'taxAmount' => $request['TaxAmount'],
                    'discount' => $request['Discount'],
                    'discountamount' => $request['DiscountAmount'],
                    'discount2' => $request['Discount2'],
                    'discount2Amount' => $request['Discount2Amount'],
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
                    'receiptno' => $request['RecieptNo'],
                    'employeesalaryid' => $request['EmployeeSalaryId'],
                    'type' => 'Debit',
                    'remarks' =>  '-',
                    'remainingamount'=> $request['rtotal'],
                         'duedate'=>$request['duedate']
                 ]);
                      

            $Memberpackages=Memberpackages::where('schemeid',$payment->schemeid)->get()->first();
            $mem = Member::where('userid',$userid)->get()->first();
            $pack=Scheme::where('schemeid',$Memberpackages->schemeid)->get()->first();
            $pack=$pack->schemename;
            $fname=$mem->firstname;
            $lname=$mem->lastname;
            $date=$payment->paymentdate;
            $fname=$fname . ' ' . $lname;
            $id=$mem->memberid;
            $joindate=$Memberpackages->joindate;
            $joindate = date("d-m-Y", strtotime($joindate));
            $enddate=$Memberpackages->expiredate;
            $enddate= date("d-m-Y", strtotime($enddate));
            $date=date("d-m-Y", strtotime($date));
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


          $msg=   DB::table('messages')->where('messagesid','14')->get()->first();
          $msg =$msg->message;
          $msg = str_replace("[Name of Member]",$fname,$msg);
          $msg= str_replace("[ID]",$id,$msg);
          // $msg= str_replace("[Name of Packge]",$pack,$msg);
          $msg= str_replace("[Full/Partial]",$TransactionType,$msg);
          $msg= str_replace("[Amount]",$amnt,$msg);
          $msg= str_replace("[InvoiceID]",$InvoiceID,$msg); 
          $msg= str_replace("[Date]",$date,$msg); 
     
          $due='';
          if($TransactionType == 'Partially'){
            $due="Due Amount:[Due Amount] Next Due Date: [Due Date]";
            $due= str_replace("[Due Amount]",$dueamnt,$due);
          $due= str_replace("[Due Date]", $duedate,$due);
        
            $msg=''.$msg.' '.$due.'';
          }
 $msg = urlencode($msg);
          $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$msg.'&route=6')->get(); 
       
      
                    $notify=Notify::create([
                  
                  'userid'=> $id,
                
                 'details'=> ''.$loginuser.' take payment of user '.$ActualAmount,
                ]); 

            $Memberpackages=Memberpackages::where('schemeid',$payment->schemeid)->get()->first();
            $mem = Member::where('userid',$userid)->get()->first();
            $pack=Scheme::where('schemeid',$Memberpackages->schemeid)->get()->first();
            $pack=$pack->schemename;
            $fname=$mem->firstname;
            $lname=$mem->lastname;
            $date=$payment->paymentdate;
            $fname=$fname . ' ' . $lname;
            $id=$mem->id;
            $joindate=$Memberpackages->joindate;
            $joindate = date("d-m-Y", strtotime($joindate));
            $enddate=$Memberpackages->expiredate;
            $enddate= date("d-m-Y", strtotime($enddate));
            $date=date("d-m-Y", strtotime($date));
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
           $summry = array("firstname"=>$fname, "joindate"=>$joindate,   
                  "enddate"=>$enddate, "amnt"=>$amnt,  "InvoiceID"=>$InvoiceID, "TransactionType"=>$TransactionType, "duedate"=>$duedate,  
                  "dueamnt"=>$dueamnt,"pack"=>$pack);


          return view('admin.summry')->with('summry',$summry);

            // $method = $request->method();
            // $pdf = new \App\paymentreceipt;
            // $pdf->generate($request,$payment);


            }
            else{
                $Payment = Payment::findOrFail($id);
                $user=User::where('userid',$Payment->userid)->get()->first();
                
                $Scheme = Scheme::where('schemeid',$Payment->schemeid)->get()->first();
                     $PaymentTypes = PaymentType::get()->all();
                
                return view('admin.makePayment',compact('Payment','PaymentTypes','Scheme','user','id'));
            }

    }
    public function summry($data){
      return view('admin.summry',compact('data',$data));
}
    public function create(Request $request)
    {   
      
        $method = $request->method();
        if ($request->isMethod('post')){

         $mode= $request['Mode'];
         $remark= $request['Remark'];
         $amount= $request['Amount'];
         $ReceiptNo =  Payment::max('ReceiptNo')+1;
 
         $UserId = $request['selectusername'];
         $ActualAmount=0;
         $member= Member::where('userid',$UserId)->get()->first();
         $member->id;


        for ($n=0; $n < count($mode) ; $n++) { 

        $ActualAmount += $amount[$n];
        $payment =  Payment::create([
        'MemberId' => $member->id,      
        'UserId' => $request['selectusername'],
        'ActualAmount' =>  $request['ActualAmount'],
        'Amount' =>  $amount[$n],
        'Tax' => '0',
        'TaxAmount' => $request['TaxAmount'],

       	'ReceiptNo' => $ReceiptNo,
        'Date' => $request['Date'],
        'PaymentDate' => now(),
        'Mode' => PaymentType::find($request['Mode'][$n])->PaymentType,
       

        // 'OtherChargesDetailsId' => $request['OtherChargesDetailsId'],
        // 'ExpenseId' => $request['ExpenseId'],
        // 'ExpenseDetailsId' => $request['ExpenseDetailsId'],
        // 'EmployeeId' => $request['EmployeeId'],
        // 'VoucherId' => $request['VoucherId'],
        // 'BillId' => $request['BillId'],
        // 'StoreBillId' => $request['StoreBillId'],
        // 'ReceiptNo' => $request['ReceiptNo'],
        // 'EmployeeSalaryId' => $request['EmployeeSalaryId'],
        'Type' => 'Credit',
        'Remarks' =>  $remark[$n],

        
     ]);
     }

      $member = Member::Where('userid',$UserId)->get()->first();
        // $MemberId = $UserId->Member->id;
       $member->amount =  $ActualAmount;
       $member->save();

        //     	$payment =  Payment::create([
        //     'UserId' => $request['selectusername'],
        //      'description' => $request['description'],
        // ]);
    //         	        $request->validate([
    // 'PaymentType' => 'required',
    // 'description' => 'max:255',
    //     ]);
        //   Payment::create([
        //     'PaymentType' => $request['PaymentType'],
        //      'description' => $request['description'],
        // ]);
         return redirect('paymenttypes')->with('message','Succesfully added');
        }
        $users=User::get()->all();
         $PaymentTypes = PaymentType::get()->all();
        return view('admin.CashCredit',compact('users','PaymentTypes'));
       
    }
}
