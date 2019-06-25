<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reason;

class ReasonController extends Controller
{
	 public function index(Request $request)
    {
            $reasons = Reason::get()->all();
            return view('admin.Reasons',compact('reasons'));
    }
    public function create(Request $request)
    {   

              $method = $request->method();
            if ($request->isMethod('post')){
            	        $request->validate([
                  'Reason' => 'required',
   
        ]);
        $usr = Reason::where('reason', $request['Reason'])->get()->all();

        if($usr){
        return redirect()->back()->withErrors('Reason Already exists');
        }

          Reason::create([
            'reason' => $request['Reason'],
            
        ]);
         return redirect('reasons')->with('message','Succesfully added');
        }
        return view('admin.addReason');
       
    }
     public function editReason($id, Request $request)
    {
    	
       
      $method = $request->method();

       $reason=Reason::findOrFail($id);

            if ($request->isMethod('post')){

              $reason->reason = $request->input('reason');
              $reason->save();

         return redirect('reasons')->with('message','Succesfully Edited');
        }
   
        return view('admin.editReason',compact('reason'));
    }

}
