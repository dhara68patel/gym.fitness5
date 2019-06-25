<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostureController extends Controller
{
   public function create(Request $request)
    {   

              $method = $request->method();
            if ($request->isMethod('post')){
            	        $request->validate([
    		'PaymentType' => 'required',
    		'description' => 'max:255',
        ]);
          PaymentType::create([
            'PaymentType' => $request['PaymentType'],
             'description' => $request['description'],
        ]);
         return redirect('paymenttypes')->with('message','Succesfully added');
        }
        return view('admin.postureAssasemenrForm');
       
    }
}
