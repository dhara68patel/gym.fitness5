<?php
namespace App;

use Dompdf\Dompdf;
use App\PaymentType;
use App\Scheme;
use App\Payment;
use App\MemberPackages;
use Illuminate\Support\Facades\View;
use App\AdminMaster;
/**
 * 
 */
class PaymentReceipt 
{
	
	  protected $pdf;
    public function __construct() {
        $this->pdf = new Dompdf;
    }
    public function generate($request) {

      $user= User::where('username',$request->username)->get()->first();
      $id=$user->id;
      $member = Member::where('User_id',$id)->get()->first();
      $phoneno = $user->MobileNo;
        $companyName='';
      $Gstno='';
      if($member->Company_id){
      $company=Company::where('id',$member->Company_id)->get()->first();
      $companyName=$company->companyName;
      $Gstno=$company->GstNo;
  
      }

$ReceiptNo = $request->RecieptNo;
          $payment= Payment::where('UserId',$id)->where('SchemeID',$request->SchemeID)->where('Mode','!=','-')->where('ReceiptNo',$ReceiptNo)->get()->all();
        
            $scheme=Scheme::where('id',$request->SchemeID)->get()->first();
      $memberpackage = MemberPackages::where('User_id',$id)->where('Scheme_id',$request->SchemeID)->get()->first();

      /*----------------for words-----------------------*/
        $no = round($payment[0]->ActualAmount
);
   $point = round($payment[0]->ActualAmount - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and  ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $word= $result . "Rupees  " . $points . " ";

  /*-----------wordss-----------------*/
  $discount=0;
  $duedate = 0;
  $totalpay=0;
 
  foreach($payment as $key => $pay){
    if($pay->DueDate){
      $duedate = $pay->DueDate;

    }
   $totalpay += $pay->Amount;
  
   if($pay->Discount){
     $discount=$pay->Discount;
     echo $discount;

  }

   
}
 $no = round($totalpay
);
   $point = round($totalpay - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'Three', '4' => 'Four', '5' => 'five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and  ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $totalpay= $result . " Rupees  " . $points . " ";
  
  $p=AdminMaster::where('Title','Tax')->get()->first();
  $tax=$p->description;
       $this->pdf->loadHtml(
        View::make('admin.paymentreceipt')->with(['member'=>$member,'totalpay'=>$totalpay,'request'=>$request,'payment'=>$payment,'phoneno'=> $phoneno,'scheme'=>$scheme,'memberpackage'=>$memberpackage,'word'=>$word,'companyName'=>$companyName,'Gstno'=>$Gstno,'duedate'=> $duedate,'discount'=>$discount,'tax'=>$tax])->render());
    $this->pdf->render();
  $member->firstname=  ucfirst($member->firstname);
    $member->lastname=  ucfirst($member->lastname);
 $this->pdf->stream(''.$member->firstname.' '.$member->lastname.'.pdf');
     }
}
 