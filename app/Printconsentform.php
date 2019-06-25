<?php
namespace App;

use Dompdf\Dompdf;
use App\PaymentType;
use App\Scheme;
use Illuminate\Support\Facades\View;
/**
 * 
 */
class Printconsentform 
{
	
	  protected $pdf;
    public function __construct() {
        $this->pdf = new Dompdf;
    }
    public function generate($request) {
      
       $this->pdf->loadHtml(
        View::make('admin.consentformprint')->with(['request'=>$request])->render());
         
    $this->pdf->render();
$request->name= ucfirst($request->firstname)." ".ucfirst($request->lastname);
 $this->pdf->stream(''.$request->name.'_consentform.pdf');
     }
}
 