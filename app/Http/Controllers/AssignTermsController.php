<?php

namespace App\Http\Controllers;
use App\Scheme;
use App\Terms;
use App\SchemeTerms;
use Illuminate\Http\Request;

class AssignTermsController extends Controller
{
   public function index(Request $request)
    {
            $schemes = Scheme::get()->all();
            $terms = Terms::get()->all();
            $schemeterms = SchemeTerms::get()->all();
            return view('admin.assignedTerms',compact('schemes','terms','schemeterms'));
    }
    	
    public function create(Request $request)
    {   

              $method = $request->method();
            if ($request->isMethod('post')){
              if($request->value){
                $items = array();

              foreach ($request->value as $key => $value) {
              if(($request->value[$key])!== null){
              array_push($items, $request->value[$key]);
              }
              }

              foreach ($request->terms as $key => $terms) {


              SchemeTerms::create([
              'termsid' => $terms,
              'schemeid' => $request['assignterms'],
              'value' => $items[$key],

              ]);

              }

              return redirect('assignedterms')->with('message','Succesfully added');
              }
                return redirect('assignedterms')->with('message','Succesfully added');
              
        }
          $schemes = Scheme::get()->all();
           $terms = Terms::get()->all();
           
        return view('admin.assignterms',compact('schemes','terms'));
       
    }
    public function  editassignterms($id, Request $request)
    {
      	$method = $request->method();
       	$schemeterms = SchemeTerms::get()->all();
       	$schemes = Scheme::get()->all();
        $terms = Terms::get()->all();	
        if ($request->isMethod('post')){
         
          if($request->value){
            $ss=SchemeTerms::find($id);
            if($ss){
                   $s=SchemeTerms::get()->where('schemeid','=', $ss->schemeid)->all();

              foreach ($s as $key => $s) {
                $s->delete();
              }
            }
            
         
              $items = array();

          foreach ($request->value as $key => $value) {
            if(($request->value[$key])!== null){
              array_push($items, $request->value[$key]);
            }
          }
              
            foreach ($request->terms as $key => $terms) {
              
          SchemeTerms::create([
            'termsid' => $terms,
            'schemeid' => $request['assignterms'],
            'value' => $items[$key],
       
          ]);
      }
                
          return redirect('assignedterms')->with('message','Succesfully Edited');
          }
           return redirect('assignedterms')->with('message','Succesfully Edited'); 	
        }
 
       
        $s=SchemeTerms::where('schemeid','=', $id)->get()->all();
    	if(!$s){
        $s = new SchemeTerms();
   		$s=array($s);
   		$s[0]->schemetermid = $id;
		$s[0]->schemeid = $id;
		         return view('admin.editAssignedTerm',compact('s','schemeterms','schemes','terms'));
    		
       }
        
       return view('admin.editAssignedTerm',compact('s','schemeterms','schemes','terms'));
    }
}
