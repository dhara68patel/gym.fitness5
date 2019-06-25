<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
   
    public function index(Request $request)
    {
            $company = Company::get()->all();
          
            return view('admin.company',compact('company'));
    }
     public function create(Request $request)
    {   

              $method = $request->method();
              if ($request->isMethod('post')){
              $request->validate([
              'companyName' => 'required',
              'GstNo' => 'required|max:15',
              ]);
     $usr = Company::where('companyname', $request['companyName'])->orwhere('gstno',$request['GstNo'])->get()->all();
   
    if($usr){
      return redirect()->back()->withErrors('Company Already exists');
    }
          Company::create([
              'companyname' => $request['companyName'],
              'gstno' => $request['GstNo'],
              'contactpersonname' => $request['contactPerson'],
              'contactpersonmobileno' => $request['contactNo'],
              'companyaddress' => $request['add'],
          ]);
         return redirect('company')->with('message','Succesfully added');
        }

        return view('admin.addCompany');
       
    }
     public function editcompany($id, Request $request)
    {
       
      $method = $request->method();
       $company=Company::findOrFail($id);
        if ($request->isMethod('post')){
        $request->validate([
        'companyName' => 'required',
        'GstNo' => 'required|max:15',
        ]);
            $company->companyname=$request->companyName;
              $company->gstno=$request->GstNo;
              $company->contactpersonname=$request->contactPerson;
              $company->contactpersonmobileno=$request->contactNo;
               $company->companyaddress=$request->add;
              
              $company->save();
         return redirect('company')->with('message','Succesfully Edited');
        }
   
        return view('admin.editcompany',compact('company'));
    }
    
}
