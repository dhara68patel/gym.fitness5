<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class TermsController extends Controller
{
   public function index(Request $request)
    {
            $terms = Terms::get()->all();
            return view('admin.terms',compact('terms'));
    }
    public function create(Request $request)
    {   

            $method = $request->method();
            if ($request->isMethod('post')){
              $request->validate([
                'Terms' => 'required',
                'Minutes' => 'max:255',
            ]);	
            $usr = Terms::where('terms', $request['Terms'])->get()->all();
    
    if($usr){
      return redirect()->back()->withErrors('Terms Already exists');
    }

          Terms::create([
            'terms' => $request['Terms'],
             'minutes' => $request['Minutes'],
             'appointment' => $request['Appointment']
        ]);
         return redirect('terms')->with('message','Succesfully added');
        }
        return view('admin.addterms');
       
    }
    public function  editterms($id, Request $request)
    {
       
      $method = $request->method();
       $term=Terms::findOrFail($id);
            if ($request->isMethod('post')){

              $request->validate([
                'Terms' => 'required',
                'Minutes' => 'max:255',
            ]); 
            $term->terms=$request->Terms;
              $term->minutes=$request->Minutes;
              $term->appointment=$request->Appointment;
              $term->save();
         return redirect('terms')->with('message','Succesfully Edited');
        }
        return view('admin.editterms',compact('term'));
    }
      public function destroy($id)
    {
        $term=Terms::findOrFail($id);
        $term->delete();
         return redirect()->back()->with('message','Succesfully deleted');
    }
}
