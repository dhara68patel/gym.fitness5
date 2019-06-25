<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheme;
use App\RootScheme;
use App\Terms;
use DB;
use App\AdminMaster;
use Carbon\Carbon;

class SchemeController extends Controller
{ 
  public function index(Request $request)
    {
             $schemes = Scheme::with('Rootscheme')->get()->all();
             
           // $schemes= Rootscheme::select('scheme_name')->get()->all();
          
            return view('admin.schemes',compact('schemes'));
    }
    public function check(Request $request)
    {
      $SchemeName=$request->get('SchemeName');
       $row=DB::table('schemes')->select('schemename')->where('schemename','=',$SchemeName)->get();

      if(count($row)<=0)
      {
        echo 'unique';
      }
      else
      {
        echo 'not_unique';
      }
    }
     public function create(Request $request)
    {   
              $method = $request->method();

            if ($request->isMethod('post')){

        $request->validate([
          'RootSchemeId' => 'required',
          'SchemeName' => 'required',
          'NumberOfDays' => 'required',
           'ActualPrice' => 'required|min:1'
      
            ]); 
             
      $usr = Scheme::where('schemename', $request['SchemeName'])->get()->all();
    
    if($usr){
      return redirect()->back()->withErrors('Scheme Already exists');
    }
 
           $scheme = Scheme::create([     
            'rootschemeid'  => $request['RootSchemeId'],  
      'schemename'  => $request['SchemeName'],  
      'numberofdays' =>$request['NumberOfDays'],
      'baseprice'  => $request['BasePrice'],    
      'tax'  => $request['Tax'],   
      'actualprice'    => $request['ActualPrice'], 
      'workinghourfrom' => Carbon::parse($request['WorkingHourFrom']), 
      'workinghourto' =>Carbon::parse($request['WorkingHourTo']),    
      'status'  => '1',   
      'validity' => $request['validity'],
      'male'   => $request['Male'],
      'female' => $request['Female'],
             
        ]);
            $scheme->male = ($request['Male']) ? 1 :0;
            $scheme->female = ($request['Female']) ? 1 :0;
            $scheme->save();
            $schemes= Scheme::get()->all();
               $terms = Terms::get()->all();

            $SchemeName = $request['SchemeName'];

            return view('admin.assignterms', compact('SchemeName','schemes','terms'));
        // return redirect('addscheme')->with('message','Succesfully added');
        }
        $scheme= RootScheme::get()->all();
        $sgst = AdminMaster::where('title','sgst')->pluck('description')->first();
        $cgst = AdminMaster::where('title','cgst')->pluck('description')->first();
       
        $sgst = (int)$sgst;
         $cgst = (int)$cgst;
        return view('admin.addScheme',compact('scheme','sgst','cgst'));
       
    }
    public function  editscheme($id, Request $request)
    {
       
      $method = $request->method();
       $scheme=Scheme::findOrFail($id);
        
        $rootscheme=RootScheme::get()->all();
   
            if ($request->isMethod('post')){
 $request->validate([
          'RootSchemeId' => 'required',
          'SchemeName' => 'required',
          'NumberOfDays' => 'required|min:0',
        'ActualPrice' => 'required|min:1'
            ]); 
            $scheme->rootschemeid=$request->RootSchemeId;
              $scheme->schemename=$request->SchemeName;
               $scheme->numberofdays=$request->NumberOfDays;
              $scheme->baseprice=$request->BasePrice;
               $scheme->tax=$request->Tax;
              $scheme->actualprice=$request->ActualPrice;
               $scheme->workinghourfrom=Carbon::parse($request->WorkingHourFrom);
              $scheme->workinghourto=Carbon::parse($request->WorkingHourTo);;
               $scheme->status=$request->status;
               $scheme->validity=$request->validity;
    
                 $scheme->male = ($request->Male) ? 1 :0;
            $scheme->female = ($request->Female) ? 1 :0;
            $scheme->save();
            
         return redirect('schemes')->with('message','Succesfully Edited');
        }

        return view('admin.editscheme', compact('scheme','rootscheme'));
    }
     public function destroy($id)
    {
        $scheme=Scheme::findOrFail($id);
        $scheme->delete();
         return redirect()->back()->with('message','Succesfully deleted');
    }
    
}
