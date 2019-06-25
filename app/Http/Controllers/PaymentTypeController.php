<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentType;

class PaymentTypeController extends Controller
{
    public function index(Request $request)
    {
            $paymentTypes = PaymentType::get()->all();
            return view('admin.paymentTypes',compact('paymentTypes'));
    }
    public function create(Request $request)
    {   

              $method = $request->method();
            if ($request->isMethod('post')){
            	        $request->validate([
    'PaymentType' => 'required',
    'description' => 'max:255',
        ]);

     $usr = PaymentType::where('paymenttype', $request['PaymentType'])->get()->all();
    
    if($usr){
      return redirect()->back()->withErrors('PaymentType Already exists');
    }
          PaymentType::create([
            'paymenttype' => $request['PaymentType'],
             'description' => $request['description'],
        ]);
         return redirect('paymenttypes')->with('message','Succesfully added');
        }
        return view('admin.addPaymentType');
       
    }
    public function editpaymenttype($id, Request $request)
    {
       
      $method = $request->method();
       $PaymentType=PaymentType::findOrFail($id);
            if ($request->isMethod('post')){

              $request->validate([
              'PaymentType' => 'required',
              'description' => 'max:255',
              ]);
           
            $PaymentType->paymenttype=$request->PaymentType;
              $PaymentType->description=$request->description;
              $PaymentType->save();
         return redirect('paymenttypes')->with('message','Succesfully Edited');
        }
   
        return view('admin.editPaymentType',compact('PaymentType'));
    }
    public function destroy($id)
    {
        $PaymentType=PaymentType::findOrFail($id);
        $PaymentType->delete();
        return redirect()->back()->with('message','Succesfully deleted');
    }

}
