<?php
namespace App;

use Dompdf\Dompdf;
use App\PaymentType;
use App\Scheme;
use Illuminate\Support\Facades\View;
use App\AdminMaster;

class Invoice
{
    protected $pdf;
    
    public function __construct() {
        $this->pdf = new Dompdf;
    }
   public function generate($request) {
  	// $mode=array();
   // 	$payment=$request->input('Amount');
   // 	$rtotal=$request->rtotal;
   // 	   		$userr=User::find($request->input('selectusername'));
   // 		$user=$userr->username;
   // 		$cell=$userr->MobileNo;
   // 		$receiptNo=$request['RecieptNo'];
   		
   // 		$scheme=Scheme::find($request->SchemeID);
   // 		$schemeamount=$scheme->ActualPrice;

   // 		$scheme=$scheme->SchemeName;

        $user= User::where('id',$request->input('selectusername'))->get()->first();
      $id=$user->id;
      $phoneno = $user->MobileNo;

   $payment=$request->input('Amount');

            $scheme=Scheme::where('id',$request->SchemeID)->get()->first();
   

   		$member=Member::where('User_id',$request->input('selectusername'))->get()->first();
      $memberId=$member->id;
   		$companyName='';
   		$Gstno='';
   		if($member->Company_id){
   		$company=Company::where('id',$member->Company_id)->get()->first();
   		$companyName=$company->companyName;
   		$Gstno=$company->GstNo;
	
   		}
   		
   		$add=$member->add;

  
	$modes=array();

    if($request->input('Mode') != 'no mode'){
	$mode=$request->input('Mode');

	foreach ($mode as $key => $mode) {
		$pa=PaymentType::find($mode);
		array_push($modes,$pa->PaymentType);
	}
}
else{
  $modes = 'no mode';
}
	$total=0;
	$paymentdate = $request->PaymentDate;
if($payment){
  foreach ($payment as $key => $pay) {
      $total+=$pay;
  
  }
}
	

  $no = round($request->ActualAmount);
   $point = round($request->ActualAmount - $no, 2) * 100;
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
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
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

  $no = round($total);
   $point = round($total - $no, 2) * 100;
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
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
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
  $actual_in_word = $result . "Rupees  " . $points . " ";


    $discount=0;
  $duedate = 0;
  if($request->Discount){
     $discount=$request->Discount;
  }
else{
  $discount=0;
}

  if($request->duedate){
    $duedate=$request->duedate;
  }
  else{
    $duedate='';
  }
$PaymentType = PaymentType::get()->all();
$remainingAmount = $request->rtotal;
$total=$request->Total;

  $p=AdminMaster::where('Title','Tax')->get()->first();
  $tax=$p->description;
    $this->pdf->loadHtml(
        View::make('admin.invoice')->with(['user'=>$user,'memberId'=>$memberId,'request'=>$request,'payment'=>$payment,'phoneno'=> $phoneno,'scheme'=>$scheme,'word'=>$word,'duedate'=> $duedate,'remainingAmount'=>$remainingAmount,'discount'=>$discount,'actual_in_word'=>$actual_in_word,'PaymentType'=>$PaymentType,'total'=>$total,'companyName'=>$companyName,'Gstno'=>$Gstno,'member'=>$member,'tax'=>$tax])->render());
    $this->pdf->render();
    $this->pdf->stream(''.$member->firstname.' '.$member->lastname.'.pdf');
 // $this->pdf->stream('invoice.pdf');
			
		}
    


}
 