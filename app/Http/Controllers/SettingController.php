<?php

namespace App\Http\Controllers;
use App\AdminMaster;
use Illuminate\Http\Request;

class SettingController extends Controller
{
      public function index(Request $request)
    {
            $settings = AdminMaster::get()->all();
            return view('admin.adminsettings',compact('settings'));
    }

    public function  editsetting($id, Request $request)
    {
       
      $method = $request->method();
       $setting=AdminMaster::findOrFail($id);
        
            if ($request->isMethod('post')){

            $request->validate([
            'title' => 'required',
            'description' => 'required|min:0|max:255',
            ]);
            $setting->title=$request->title;
              $setting->description=$request->description;
            $setting->save();
            
         return redirect('settings')->with('message','Succesfully Edited');
        }

        return view('admin.editsetting', compact('setting'));
    }
}
