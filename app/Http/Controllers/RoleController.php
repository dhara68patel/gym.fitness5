<?php

namespace App\Http\Controllers;

use App\Role;
use Flash;use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $roles = Role::get()->all();
            return view('admin.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   

              $method = $request->method();
            if ($request->isMethod('post')){
                    $request->validate([
                    'EmployeeRole' => 'required',
                    'description' => 'max:255',
                    ]);
                      $usr = Role::where('employeerole', $request['EmployeeRole'])->get()->all();

        if($usr){
        return redirect()->back()->withErrors('Role Already exists');
        }
          Role::create([
            'employeerole' => $request['EmployeeRole'],
             'description' => $request['description'],
        ]);
         return redirect('roles')->with('message','Succesfully added');
        }
        return view('admin.addrole');
       
    }
        
    public function addrole()
    {
          
         return view('admin.addrole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */

    public function editRole($id, Request $request)
    {
       
      $method = $request->method();
       $role=Role::findOrFail($id);
            if ($request->isMethod('post')){
                $request->validate([
                    'EmployeeRole' => 'required',
                    'description' => 'max:255',
                    ]);

            $role->employeerole=$request->EmployeeRole;
              $role->description=$request->description;
              $role->save();
               

         return redirect('roles')->with('message','Succesfully Edited');
        }
   
        return view('admin.editRole',compact('role'));
    }
    public function edit(Request $request, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, $id)
    {
        $role=Role::findOrFail($id);
        $role->delete();
         return redirect()->back()->with('message','Succesfully deleted');
    }
}
    //$request->merge([ 
   //      'fitnessgoals' => implode(',', (array) $request->get('fitnessgoals'))
   //   ]); 

            // $my_array2 = $request->all();

            // $my_array2['MemberId'] = $data->id;
                
            // Fitnessgoals::create(
            //     $my_array2
            // );