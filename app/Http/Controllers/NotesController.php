<?php

namespace App\Http\Controllers;
use App\User;
use App\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
  public function addnote(Request $request){
  		  $note=$request->get('note');
  		  $user=$request->get('user');
  		 $username = User::where('username',$user)->get()->first();
      $row= Notes::create([
            'userid' => $username->userid,
             'notes' => $note,
        ]);

      echo json_encode($row);
  }
  public function deletenote(Request $request){
  	$note = $request->get('note');
  	$delet = Notes::findOrFail($note);
  	$delet->delete(); 

  }
  public function editnote(Request $request){
  	$id=$request->get('id');
  	 $note=$request->get('note');
  		  $user=$request->get('user');
  		 $updatenote = Notes::findOrFail($id);
  		 $updatenote->notes=$note;
  		 $updatenote->save();

  }
  public function viewnote(Request $request){
    $id=$request->get('id');
    
       $updatenote = Notes::findOrFail($id);
  
       echo json_encode($updatenote);

  }
  
 public function imageupload(Request $request){
 
  $request->validate([
            
             'image_upload.*' => 'mimes:jpeg,bmp,png|max:2000',
              ]);

   if($request->hasfile('image_upload'))
     {
        foreach($request->file('image_upload') as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  
        }
     $noteid = $request['note']; 
     // $user=User::where('username',$username)->get()->first();
     // $id=$user->id;
  
     $file = Notes::where('notesid',$noteid)->get()->first();

     $file->images=json_encode($data);
     $file->save();
     }
     return redirect()->back();
   }
    
}