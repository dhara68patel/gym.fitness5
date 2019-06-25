<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\Followup;
use App\Reason;
use DB;
use Carbon;
use Curl;
use App\Notification;
use App\Followupcalldetails;

class FollowupController extends Controller
{
        public function index(Request $request)
    {
    if($request->isMethod('post'))
      {
        
        if($request->get('from')!="")
        {
          
            $from = date($request->get('from'));
            if($request->get('to')){
            $to = date($request->get('to'));
            }
            else{
              $to = date('Y-m-d');
            }

        $followup = Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->whereBetween('followupdays', [$from, $to])->select(['followup.status as fstatus','followup.*','inquiries.*'])->get()->all();
          
        return view('admin.followup',compact('followup'));
      }
      elseif($request->get('status')!=""){
        $status=$request->get('status');
        // dd($status);

         $followup = Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.status',$status)->select(['followup.status as fstatus','followup.*','inquiries.*'])->get()->all();
         return view('admin.followup',compact('followup'));
      }

      $followup = Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->select(['followup.status','followup.*','inquiries.*'])->get()->all();


    
    return view('admin.followup',compact('followup'));
   
}
$followup = Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->select(['followup.status as fstatus','followup.*','inquiries.*'])->get()->all();


    
    return view('admin.followup',compact('followup'));
  }
       public function addfollowup($id,Request $request){

          $followup= Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.inquiryid','=',$id)->get()->first();
    
          $method = $request->method();
             
            if ($request->isMethod('post')){
            
             $followupcomplete =  Followup::where('inquiryid',$id)->get()->all();
             foreach ($followupcomplete as $key => $followupcomplete) {
               # code...
             
              $followupcomplete->reason =  $request['Reason'];
              $followupcomplete->status = 'Completed';
              $followupcomplete->followuptakendate = Carbon\Carbon::today()->format('Y-m-d');

              $followupcomplete->save();
            }
          $data = [
                                          'inquiriesid'=> $id,
                                            'userid'=> $followup->UserId,
                                            'followuptime'=> $request['ftime'],
                                            'remarks'=> $request['stime'],
                                            'followupdays' => $request['FollowUpDays'],
                                            'status'=> 'Pending',
            ];

     DB::table('followup')->insert($data);
              
                                        //      $followup_table_data =Followup::create([

                                        //     'InquiryId'=> $id,
                                        //     'UserId'=> $followup->UserId,
                                        //     'FollowUpTime'=> $request['ftime'],
                                        //     'Remarks'=> $request['stime'],
                                        //     'FollowUpDays' => $request['FollowUpDays'],
                                        //     'Status'=> 'pending',

                                        // ]);
             $followup = Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiriesid')->select(['followup.status as fStatus','followup.reason as fReason','followup.*','inquiries.*'])->get()->all();                       
              return view('admin.followup',compact('followup'));                          
            }
          return view('admin.addFollowup',compact('followup'));
       }

       public function viewfollowup($id,Request $request){

        $followup = Followup::where('inquiryid',$id)->get()->all();

         $followupid= Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.inquiryid','=',$id)->get()->first();

         $package = DB::table('schemes')->get()->all();

       // return view('admin.viewfollowupmodel',compact('followup','id'));

        return view('admin.viewfollowupmodel',compact('followup','id','followupid','package'));

       }

        public function editfollowupmodel($id,Request $request){

           $followup = Followup::where('inquiryid',$id)->get()->all();
           $followupid= Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.inquiryid','=',$id)->get()->first();
            $package = DB::table('schemes')->get()->all();

            $followupCallDetails = Followupcalldetails::where('inquiriesid',$followupid->inquiryid)->max('followupcalldetailsid');

            $fcd = Followupcalldetails::where('followupcalldetailsid',$followupCallDetails)->get();
           

           if($request->isMethod('post')){

             $v = $request->validate([
                          'callcompletedby' => 'required',
                          'callresponse' => 'required',
                          'callduration' => 'required',
                          'callqulity' => 'required',
                          'package' => 'required',                  
                        ]);


             $data = [

                        'callcompletedby' => $request->input('callcompletedby'),
                        'callresponse' => $request->input('callresponse'),
                        'calldate' => $request->input('calldate'),
                        'callduration' => $request->input('callduration'),
                        'callnotes' => $request->input('notes'),
                        'callrating' => $request->input('callqulity'),
                        'schemeid' => $request->input('package'),
                        'schedulenextcalldate' => $request->input('scheduledate'),
                        'scheduleassign' => $request->input('assign'),
                        'trainer' => $request->input('trainer'),
                        'freetrial' => $request->input('freetrialdate'),
                        'freetrialpackage' => $request->input('ftp'),
            'created_at'     => date('Y-m-d  H:i:s'),
                        'updated_at'     => date('Y-m-d  H:i:s'),

                    ];
               

                DB::table('followupcalldetails')->where('followupcalldetailsid',$fcd['0']->followupcalldetailsid)->update($data);

              return redirect('followup');
      
            }

            return view('admin.editfollowupmodel',compact('followup','id','followupid','package','followupCallDetails','fcd'));

        }


       public function viewfollowupcall($id,Request $request){



        $followupid= Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.inquiryid','=',$id)->get()->first();
        

        $viewfollowupcallid = $followupid->followupid;
        $mobileno = $followupid->mobileno;

       $dnd = DB::table('notification')->where('mobileno','=',$mobileno)->get()->first();


          if ($request->isMethod('post')){
            
            // $data = [

            //             $callcompletedby = $request->input('callcompletedby'),
            //             $callresponse = $request->input('callresponse'),
            //             $date = $request->input('calldate'),
            //             $notes = $request->input('notes'),
            //             $callqulity = $request->input('callqulity'),
            //             $package = $request->input('package'),
            //             $scheduledate = $request->input('scheduledate'),
            //             $assign = $request->input('assign'),
            //             $trainer = $request->input('trainer'),
            //             $freetrialdate = $request->input('freetrialdate'),
            //             $ftp = $request->input('ftp'),

            //         ];

            $v = $request->validate([
                          'callcompletedby' => 'required',
                          'callresponse' => 'required',
                          'callduration' => 'required',
                          'callqulity' => 'required',
                          'package' => 'required',                  
                        ]);


                     $data = [

                        'inquiriesid'   => $viewfollowupcallid,
                        'callcompletedby' => $request->input('callcompletedby'),
                        'callresponse' => $request->input('callresponse'),
                        'calldate' => $request->input('calldate'),
                        'callduration' => $request->input('callduration'),
                        'callnotes' => $request->input('notes'),
                        'callrating' => $request->input('callqulity'),
                        'scheme' => $request->input('package'),
                        'schedulenextcalldate' => $request->input('scheduledate'),
                        'scheduleassign' => $request->input('assign'),
                        'trainer' => $request->input('trainer'),
                        'freetrial' => $request->input('freetrialdate'),
                        'freetrialpackage' => $request->input('ftp'),
             'created_at'     => date('Y-m-d  H:i:s'),
                        'updated_at'     => date('Y-m-d  H:i:s'),

                    ];
             

        
          if($dnd->sms == 1){
             

                      $packages = $request->input('package');
                      $package = DB::table('schemes')->where('schemename',$packages)->get()->first();
                      $mem = Inquiry::where('inquiriesid',$viewfollowupcallid)->get()->first();
                      $fname=$mem->firstname;
                      $lname=$mem->lastname;
                      $mobileno =$mem->mobileno;
                      $packagename = $package->schemename;
                      $date =  $request->input('scheduledate');
                      $poc = $request->input('assign');

                  //$msgid=   DB::table('message')->where('id','15')->select('id')->first(); 
                  //$msgid= $msgid->id;

                  $msg=   DB::table('messages')->where('messagesid','15')->get()->first();
   
                  $msg =$msg->message;         
                  $msg = str_replace("[FirstName]",$fname,$msg);
                  $msg= str_replace("[LastName]",$lname,$msg);
                  $msg= str_replace("[Packge]",$packagename,$msg);
                  $msg= str_replace("[Date]",$date,$msg);
                  $msg= str_replace("[POC]",$poc,$msg);


                  $nmd = [

                      'mobileno' => $mobileno,
                      'smsmsg' => $msg,
                      'mailmsg' => '0',
                      'callnotes' => '0',
                    ];

              $msg = urlencode($msg);
 
                  $otpsend = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$mobileno.'&text='.$msg.'&route=6')->get(); 
                 

                  DB::table('notoficationmsgdetails')->insert($nmd);
             }
                DB::table('followupcalldetails')->insert($data);

                return redirect('inquiry');
          }

       }


       public function viewfollowupprofile($id,Request $request){

         $method = $request->method();
          //$f=Followup::findOrFail($id);
          

           $info= Followup::leftJoin('inquiries','inquiries.inquiriesid','=','followup.inquiryid')->where('followup.inquiryid','=',$id)->first();
           


        $followup_call_details = DB::table('followupcalldetails')->where('inquiriesid','=',$id)->get();

        $callnotes = DB::table('followupcalldetails')->select('callnotes')->where('inquiriesid','=',$id)->get()->last();

        

        $schedule = DB::table('followupcalldetails')->select('schedulenextcalldate','scheduleassign')->where('inquiriesid','=',$id)->get()->last();
        

        $freetiral = DB::table('followupcalldetails')->select('trainer','freetrial','freetrialpackage')->where('inquiriesid','=',$id)->get()->last();
              
         $package =DB::table('followupcalldetails')->leftJoin('schemes','schemes.schemename','=','followupcalldetails.scheme')->where('followupcalldetails.inquiriesid','=',$id)->get()->last();


        return view('admin.viewfollowupprofile',compact('package','followup_call_details','freetiral','info','schedule','callnotes'));


       }

       public function editfollowup($id,Request $request) 
       {
         $method = $request->method();
          $f=Followup::findOrFail($id);
            if ($request->isMethod('post')){
              $f->Reason=$request->reason;
            $f->followupdays=$request->FollowUpDays;
              $f->followuptime=$request->FollowUpTime;
               $f->remarks=$request->Specifictime;
              $f->save();
               

         return redirect('viewfollowup/'.$f->inquiryid)->with('message','Succesfully Edited');
        }
   
        return view('admin.editfollowup',compact('f'));
         

       }

       public function notificationvia(Request $request){

        $mobile_no = $request->input('mobileno');
        
          $sms  = $request->input('sms');
          $mail  = $request->input('mail');
          $call  = $request->input('call');

          $moblastdigit =  substr($mobile_no, 4, 6);
          $moblastdigit = 'xxxxxx';
         
          $inquiry = DB::table('notification')->where('mobileno','=',$mobile_no)->first();

          //$inquiry = DB::table('notification')->select('inquiry_id')->get();

          if ($call == '') {
            echo "string";
          }

          $data = [
       
                      'sms'  => $sms,
                      'email' => $mail,
                      'call' => $call,

                   ];



        if ($inquiry) {
          
          DB::table('notification')->where('mobileno','=',$mobile_no)->update($data);
        }
        else{

           $datainsert = [
                      'mobileno' => $mobile_no,
                      'sms'  => $sms,
                      'email' => $mail,
                      'call' => $call,

                   ];

            DB::table('notification')->insert($datainsert);
        }
        
       }

       public function ajaxgetnotification(Request $request){

         $mobile_no = $request->input('notificationid');

         $q = DB::table('notification')->where('mobileno','=',$mobile_no)->get();

         echo json_encode($q);
       }



}
