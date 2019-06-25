<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Addpt;
use App\Ptslot;
use App\Member;



class PersonalTrainerController extends Controller
{

   public function index(){
    echo "string";
   }

   public function editpttime(Request $request){
    DB::enableQueryLog();

    if($request->isMethod('post'))
    {
      // echo $request;
      $n=$request->post('index');
      // echo $n;
      for($i=0;$i<=$n-1;$i++)
      {
        // echo "$i";
      $strainerid= $request->post('strainerid');
      $todate= $request->post('todate');
      $sdays= $request->post('sdays'.$i);
      // echo $sdays;exit;
      if($request->post('600'.$i)=="")
      {
        $t6='-1';
      }
      else
      {
        $t6='0';
      }
      if($request->post('700'.$i)=="")
      {
        $t7='-1';
      }
      else
      {
        $t7=0;
      }
      if($request->post('800'.$i)=="")
      {
        $t8='-1';
      }
      else
      {
        $t8=0;
      }
      if($request->post('900'.$i)=="")
      {
        $t9='-1';
      }
      else
      {
        $t9='0';
      }
      if($request->post('1000'.$i)=="")
      {
        $t10='-1';
      }
      else
      {
        $t10=0;
      }
      if($request->post('1100'.$i)=="")
      {
        $t11='-1';
      }
      else
      {
        $t11=0;
      }
      if($request->post('1200'.$i)=="")
      {
        $t12='-1';
      }
      else
      {
        $t12=0;
      }
      if($request->post('1300'.$i)=="")
      {
        $t13='-1';
      }
      else
      {
        $t13=0;
      }
      if($request->post('1400'.$i)=="")
      {
        $t14='-1';
      }
      else
      {
        $t14=0;
      }
      if($request->post('1500'.$i)=="")
      {
        $t15='-1';
      }
      else
      {
        $t15=0;
      }
      if($request->post('1600'.$i)=="")
      {
        $t16='-1';
      }
      else
      {
        $t16=0;
      }
      if($request->post('1700'.$i)=="")
      {
        $t17='-1';
      }
      else
      {
        $t17=0;
      }
      if($request->post('1800'.$i)=="")
      {
        $t18='-1';
      }
      else
      {
        $t18=0;
      }
      if($request->post('1900'.$i)=="")
      {
        $t19='-1';  
      }
      else
      {
        $t19=0;
      }
      if($request->post('2000'.$i)=="")
      {
        $t20='-1';
      }
      else
      {
        $t20=0;
      }
      if($request->post('2100'.$i)=="")
      {
        $t21='-1';
      }
      else
      {
        $t21=0;
      }
      if($request->post('2200'.$i)=="")
      {
        $t22='-1';
      }
      else
      {
        $t22=0;
      }
      if($request->post('2300'.$i)=="")
      {
        $t23='-1';
      }
      else
      {
        $t23=0;
      }

       $update=[
                 't600' => $t6,
                 't700' => $t7,
                 't800' => $t8,
                 't900' => $t9,
                 't1000' =>$t10,
                 't1100' =>$t11,
                 't1200' =>$t12,
                 't1300' =>$t13,
                 't1400' =>$t14,
                 't1500' =>$t15,
                 't1600' =>$t16,
                 't1700' =>$t17,
                 't1800' =>$t18,
                 't1900' =>$t19,
                 't2000' =>$t20,
                 't2100' =>$t21,
                 't2200' =>$t22,
                 't2300' =>$t23,
                 'fromdate'=>$todate];
      $ptslot = DB::table('ptslot')->where(['trainerid' => $strainerid,'day' => $sdays])->update($update);
     
      // dd($ptslot);
      // dd( DB::getQueryLog());
      // $ptslot->save();
    }
    }
    // dd($trainerid);
    // return view('admin.Add_PT_Time',compact('ptslots','employees','day','trainerid'));

    return redirect('personaltrainer/addpttime');
     // dd($query);
    // echo $percentage;
     // echo json_encode($percentage);
      // return view('admin.Assign_PT_Level');
   }

   public function assignPTTime(Request $request){
    DB::enableQueryLog();
    $trainerid='';
    $day=array();
    if($request->isMethod('post'))
    {
      $trainerid= $request->post('trainerid');
      $day= $request->post('day');
      // dd($day);
      $ptslots =  Ptslot::where(['trainerid' => $trainerid])->whereIn('day',$day)->get()->all();
       // print_r($ptslots);exit;
       // dd( DB::getQueryLog());
      if($ptslots == null)
      {
         
         $day=array();
         $day[0]='Sunday';
         $day[1]='Monday';
         $day[2]='Tuesday';
         $day[3]='Wednesday';
         $day[4]='Thursday';
         $day[5]='Friday';
         $day[6]='Saturday';
         $todate=date('Y-m-d');
         // dd($day);
         for($n=0;$n<count($day);$n++)
         {
          // dd($day[$n]);
            $insert=new Ptslot;
            $insert->trainerid=$trainerid;
            $insert->day=$day[$n];
            $insert->fromdate=$todate;
            $insert->{'t600'}=0;
            $insert->{'t700'}=0;
            $insert->{'t800'}=0;
            $insert->{'t900'}=0;
            $insert->{'t1000'}=0;
            $insert->{'t1100'}=0;
            $insert->{'t1200'}=0;
            $insert->{'t1300'}=0;
            $insert->{'t1400'}=0;
            $insert->{'t1500'}=0;
            $insert->{'t1600'}=0;
            $insert->{'t1700'}=0;
            $insert->{'t1800'}=0;
            $insert->{'t1900'}=0;
            $insert->{'t2000'}=0;
            $insert->{'t2100'}=0;
            $insert->{'t2200'}=0;
            $insert->{'t2300'}=0;
            $insert->save();
         }
      }
      $ptslots =  Ptslot::where(['trainerid' => $trainerid])->whereIn('day',$day)->get()->all();
    }

    else
    {
      $ptslots =  DB::table('ptslot')->where('ptslotid','=','')->get();
    }

    $employees=Employee::where('roleid','4')->get()->all();
    // dd($trainerid);

   return view('admin.Add_PT_Time',compact('ptslots','employees','day','trainerid'));

    // return redirect('personaltrainer/addpttime')->with('ptslots');
     // dd($query);
    // echo $percentage;
     // echo json_encode($percentage);
      // return view('admin.Assign_PT_Level');
   }
   public function editassignptlevel(Request $request){

     $employee= $request->post('employee');
     $mobile_no= $request->post('mobile_no');
     $level= $request->post('level');
     $percentage= $request->post('percentage');
     $query =  DB::table('ptassignlevel')->where('ptassignlevelid','=',$request->post('id'))->update(
                    ['trainerid' => $employee, 'levelid' => $level,'percentage'=>$percentage,'created_at'=>date('y-m-d'),'updated_at'=>date('y-m-d')]
                );
      $employee = DB::table('employee')->where('roleid','4')->get();
      $ptlevel = DB::table('ptlevel')->get();
      $ptassignlevel = DB::table('ptassignlevel')->leftJoin('employee', 'ptassignlevel.trainerid', '=', 'employee.employeeid')->get();

    return redirect('personaltrainer/assignptlevel');
     // dd($query);
    // echo $percentage;
     // echo json_encode($percentage);
      // return view('admin.Assign_PT_Level');
   }
  public function addassignptlevel(Request $request){

     $employee= $request->post('employee');
     $mobile_no= $request->post('mobile_no');
     $level= $request->post('level');
     $percentage= $request->post('percentage');
     $query =  DB::table('ptassignlevel')->insert(
                    ['trainerid' => $employee, 'levelid' => $level,'percentage'=>$percentage,'created_at'=>date('y-m-d'),'updated_at'=>date('y-m-d')]
                );
      $employee = DB::table('employee')->where('roleid','4')->get();
      $ptlevel = DB::table('ptlevel')->get();
      // $ptassignlevel = DB::table('ptassignlevel')->leftJoin('employee', 'ptassignlevel.trainerid', '=', 'employee.employeeid')->get();

  $ptassignlevel = DB::table('ptassignlevel')->leftJoin('employee', 'ptassignlevel.trainerid', '=', 'employee.employeeid')->where('employee.roleid','4')->get();

    return view('admin.Assign_PT_Level',compact('employee','ptlevel','ptassignlevel'));
     // dd($query);
    // echo $percentage;
     // echo json_encode($percentage);
      // return view('admin.Assign_PT_Level');
   }
   public function setpercentage(Request $request){

     $level= $request->get('level');
     $percentage =  DB::table('ptlevel')->select('percentage')->where('level','=',$level)->get();
     // dd($percentage);
    // echo $percentage;
     echo json_encode($percentage);
      // return view('admin.Add_PT_Level',compact('percentage'));
   }

   public function addptlevel(){

      $addptlevel =  DB::table('ptlevel')->get();
   

      return view('admin.Add_PT_Level',compact('addptlevel'));
   }

   public function addptleveldatacreate(Request $request){

        $data = [

                 'level'     => $request['level'],
                'percentage' => $request['percentage'],

             ];

      DB::table('ptlevel')->insert($data);

      return redirect('personaltrainer/addptlevel');
    
   }

   public function editptlevel(Request $request){

      $id = $request->input('id');
      $level = $request->input('level');
      $percentage = $request->input('percentage');

      $data = [

             'level' => $level,
             'percentage' => $percentage     

             ];


      DB::table('ptlevel')->where('id',$id)->update($data);

      return redirect('personaltrainer/addptlevel');


   }

    public function assignptlevel(){

        $employee = DB::table('employee')->where('roleid','4')->get();
        $ptlevel = DB::table('ptlevel')->get();
        $ptassignlevel = DB::table('ptassignlevel')->leftJoin('employee', 'ptassignlevel.trainerid', '=', 'employee.employeeid')->get();

    return view('admin.Assign_PT_Level',compact('employee','ptlevel','ptassignlevel'));
   }

   public function assignptlevelajax(Request $request){

          $employee = $request->get('employee');

      
         $demo =  DB::table('employee')->where('employeeid', '=', $employee)->pluck('mobileno');
        
   
      
         
        // $demo =  DB::table('employee')->select('id','mobile_no')->get()->all();
        // $q = $demo->mobile_no;
         // print_r($demo['0']);exit;
      
        return response()->json($demo);
   }  
   public function assignptmemberajax(Request $request){
// DB::enableQueryLog();
          $member = $request->get('memberid');
          // print_r($member);

      
         $demo =  DB::table('member')->select('mobileno')->where('memberid', '=', $member)->get();
        // dd($demo);
         // dd( DB::getQueryLog());
         echo $demo[0]->mobileno;
        // return response()->json($demo['mobileno']);
   }  

   public function assignptpackageajax(Request $request){
// DB::enableQueryLog();
          $member = $request->get('memberid');
          $type = $request->get('type');
          $schemeid = $request->get('schemeid');
          // print_r($member);
          if($type=='package')
          {      
             $demo =  DB::table('member')->select('userid')->where('memberid', '=', $member)->get();

             $package = DB::select( DB::raw("SELECT memberpackages.*,schemes.schemeid,schemes.schemename from memberpackages left Join schemes on memberpackages.schemeid=schemes.schemeid  where memberpackages.userid='".$demo[0]->userid."' AND memberpackages.status='1'"));

             // $query=DB::table('memberpackages')->select('Scheme_id')->where('User_id',)->where('status','Active')->get();
             // $schemeid=array();
             // foreach ($query as $key => $value) {

             //    $scheme=DB::table('schemes')->select('SchemeName','schemesid')->where('schemesid',$value->Scheme_id)->get();

             //    $schemeid[]=$scheme[0];
             // }
            // dd($demo);
             // dd( DB::getQueryLog());
             echo json_encode($package);
          }
          if($type=='pthour')
          {
            // echo 'hi';
            // $demo =  DB::table('schemeterms')->select('value')->where('Schemeid', '=', $schemeid)->where('Termid','5')->get();
            $demo =  DB::table('memberpackages')->leftJoin('schemeterms','memberpackages.schemeid','=','schemeterms.schemeid')->where('memberpackages.memberpackagesid', '=', $schemeid)->where('schemeterms.termsid','2')->get();
            // dd($demo);
             // dd( DB::getQueryLog());
             echo $demo[0]->value;
          }
        // return response()->json($demo['mobileno']);
   }

  public function assigntimeslotajax(Request $request){
          // DB::enableQueryLog();
          $trainerid = $request->get('trainerid');
          // print_r($member);

          $ptslots =DB::select( DB::raw("SELECT ptslot.day as Day,ptmember.* from ptslot LEFT JOIN  ptmember ON ptslot.trainerid = ptmember.trainerid AND ptmember.status='Active' AND ptslot.day=ptmember.day  where ptslot.trainerid = '".$trainerid."'"));

          // $ptslots =  DB::table('ptslot')->leftJoin('ptmember',['ptslot.TrainerId'=>'ptmember.TrainerId','ptslot.Day'=>'ptmember.day'])->where(['ptslot.TrainerId' => $trainerid ,'ptmember.status' => 'Active'])->get()->all();
          // dd( DB::getQueryLog());
         echo json_encode($ptslots);
        // return response()->json($demo['mobileno']);
   }  
  public function assignpttomember(Request $request){
          DB::enableQueryLog();

    if($request->isMethod('post'))
    {
      // echo $request;exit;
      $n=6;
      // echo $n;
      for($i=0;$i<=$n;$i++)
      {
        // echo "$i";
      $strainerid= $request->post('strainerid');
      $memberid=$request->post('memberid');
      $fromdate= $request->post('fromdate');
      $sday=$request->post('sday'.$i);
      $memberpackagesid=$request->post('memberpackagesid');
      $q=DB::select( DB::raw("SELECT  numberofdays from schemes  where schemeid = (select schemeid from memberpackages where memberpackagesid=".$memberpackagesid.")"));
      $nod=$q[0]->numberofdays;
      $todate= date('Y-m-d', strtotime($fromdate. ' +'.$nod.' days'));
      for($date=$fromdate;$date<=$todate;$date=date('Y-m-d',strtotime($date.'+ 1 days ')))
      {
        $day=date('l',strtotime($date)); 
        if($day==$sday)
        {
          // dd($i);
          $t='';
          if($request->post('600'.$i)!="")
          {
            $t=$request->post('600'.$i);
          }
          if($request->post('700'.$i)!="")
          {
            $t=$request->post('700'.$i);
          }
          if($request->post('800'.$i)!="")
          {
            $t=$request->post('800'.$i);
          }
          if($request->post('900'.$i)!="")
          {
            $t=$request->post('900'.$i);
          }
          if($request->post('1000'.$i)!="")
          {
            $t=$request->post('1000'.$i);
          }
          if($request->post('1100'.$i)!="")
          {
            $t=$request->post('1100'.$i);
          }
          if($request->post('1200'.$i)!="")
          {
            $t=$request->post('1200'.$i);
          }
          if($request->post('1300'.$i)!="")
          {
            $t=$request->post('1300'.$i);
          }
          if($request->post('1400'.$i)!="")
          {
            $t=$request->post('1400'.$i);
          }
          if($request->post('1500'.$i)!="")
          {
            $t=$request->post('1500'.$i);
          }
          if($request->post('1600'.$i)!="")
          {
            $t=$request->post('1600'.$i);
          }
          if($request->post('1700'.$i)!="")
          {
            $t=$request->post('1700'.$i);
          }
          if($request->post('1800'.$i)!="")
          {
            $t=$request->post('1800'.$i);
          }
          if($request->post('1900'.$i)!="")
          {
            $t=$request->post('1900'.$i);
          }
          if($request->post('2000'.$i)!="")
          {
            $t=$request->post('2000'.$i);
          }
          if($request->post('2100'.$i)!="")
          {
            $t=$request->post('2100'.$i);
          }
          if($request->post('2200'.$i)!="")
          {
            $t=$request->post('2200'.$i);
          }
          if($request->post('2300'.$i)!="")
          {
            $t=$request->post('2300'.$i);
          }
          // dd($t);
           $insert=[
                     'trainerid' => $strainerid,
                     'memberid' => $memberid,
                     'date'=>$date,
                     'fromdate' => $fromdate,
                     'todate' => $todate,
                     'day' => $day,
                     'packageid'=>$memberpackagesid,
                     'hoursfrom' =>$t];
          $pm = DB::table('ptmember')->insert($insert);
        }
      }
      // dd($todate);
      // $sdays= $request->post('sdays'.$i);
      // echo $sdays;exit;
      }
    }

    return redirect('personaltrainer/assignmembertotrainer');
   } 

   public function editassignpttomember(Request $request){
          DB::enableQueryLog();

    if($request->isMethod('post'))
    {
      // echo $request;exit;
      $strainerid= $request->post('strainerid');
      $memberid=$request->post('memberid');
      $memberpackagesid=$request->post('memberpackagesid');
      $fromdate= $request->post('fromdate');
       $update=[
                 'todate' => $fromdate,
                 'status' => 'Updated'];
      $ptmemberupdate = DB::table('ptmember')->where(['trainerid' => $strainerid,'status'=>'Active','packageid'=>$memberpackagesid,'memberid' => $memberid])->update($update);

      $fdate = DB::select( DB::raw("SELECT distinct ptmember.fromdate from ptmember  where trainerid = '".$strainerid."' AND memberId = '".$memberid."'"));
      $fd=$fdate[0]->fromdate;

      $q=DB::select( DB::raw("SELECT  numberofdays from schemes  where schemeid = (select schemeid from memberpackages where memberpackageid=".$memberpackagesid.")"));
      $nod=$q[0]->numberofdays;
      $fdd=date('Y-m-d',strtotime($fd. ' + '.$nod.' days'));
      $td = $fdd;
      // echo $td;exit;
      $n=6;
      // echo $n;
      for($i=0;$i<=$n;$i++)
      {
        // echo "$i";
      $sday=$request->post('sday'.$i);
      for($date=$fd;$date<=$td;$date=date('Y-m-d',strtotime($date.'+ 1 days ')))
      {
        $day=date('l',strtotime($date)); 
        if($day==$sday)
        {
          // dd($i);
          $t='';
          if($request->post('600'.$i)!="")
          {
            $t=$request->post('600'.$i);
          }
          if($request->post('700'.$i)!="")
          {
            $t=$request->post('700'.$i);
          }
          if($request->post('800'.$i)!="")
          {
            $t=$request->post('800'.$i);
          }
          if($request->post('900'.$i)!="")
          {
            $t=$request->post('900'.$i);
          }
          if($request->post('1000'.$i)!="")
          {
            $t=$request->post('1000'.$i);
          }
          if($request->post('1100'.$i)!="")
          {
            $t=$request->post('1100'.$i);
          }
          if($request->post('1200'.$i)!="")
          {
            $t=$request->post('1200'.$i);
          }
          if($request->post('1300'.$i)!="")
          {
            $t=$request->post('1300'.$i);
          }
          if($request->post('1400'.$i)!="")
          {
            $t=$request->post('1400'.$i);
          }
          if($request->post('1500'.$i)!="")
          {
            $t=$request->post('1500'.$i);
          }
          if($request->post('1600'.$i)!="")
          {
            $t=$request->post('1600'.$i);
          }
          if($request->post('1700'.$i)!="")
          {
            $t=$request->post('1700'.$i);
          }
          if($request->post('1800'.$i)!="")
          {
            $t=$request->post('1800'.$i);
          }
          if($request->post('1900'.$i)!="")
          {
            $t=$request->post('1900'.$i);
          }
          if($request->post('2000'.$i)!="")
          {
            $t=$request->post('2000'.$i);
          }
          if($request->post('2100'.$i)!="")
          {
            $t=$request->post('2100'.$i);
          }
          if($request->post('2200'.$i)!="")
          {
            $t=$request->post('2200'.$i);
          }
          if($request->post('2300'.$i)!="")
          {
            $t=$request->post('2300'.$i);
          }
          // echo $t;
           $insert=[
                     'trainerid' => $strainerid,
                     'memberid' => $memberid,
                     'date'=>$date,
                     'fromdate' => $fd,
                     'todate' => $td,
                     'day' => $day,
                     'packageid'=>$memberpackagesid,
                     'hoursfrom' =>$t];
          $pm = DB::table('ptmember')->insert($insert);
        }
      }

      }
    }

    return redirect('personaltrainer/assignmembertotrainer');
   }  

    public function manageassignedmember(Request $request){

      if($request->isMethod('post'))
      {
        $memberid=$request->post('memberid');
        $packageid=$request->post('packageid');

        $grid=DB::table('ptmember')->leftJoin('employee','employee.employeeid','=','ptmember.trainerid')->where(['ptmember.memberid'=>$memberid,'packageid'=>$packageid,'ptmember.status'=>'Active'])->get();

        $employees=Employee::where('roleid','4')->get()->all();
        $members=Member::get()->all();

        return view('admin.manageassignedmember',compact('members','employees','grid','memberid','packageid'));
      }
      else
      {
        $employees=Employee::where('roleid','4')->get()->all();
        $members=Member::get()->all();
        $grid=array();
        return view('admin.manageassignedmember',compact('members','employees','grid'));
      }
   }
   public function claimptsession(Request $request){

      $employees=Employee::where('roleid','4')->get()->all();
      $members=Member::get()->all();
      $grid=array();

      $memberid=$request->post('ptmemberid');
      $update=['status'=>'conducted',
              'conducteddate'=>date('Y-m-d H:i:s')
      ];
      $query=DB::table('ptmember')->where('ptmemberid',$memberid)->update($update);

    return view('admin.manageassignedmember',compact('members','employees','grid'));
   }
   public function edittimeofmemberajax(Request $request){
       DB::enableQueryLog();
      $memberid=$request->get('ptmemberid');
      $trainerid=$request->get('trainerid');
      $time=$request->get('time');
      $update=['hoursfrom'=>$time,
               'trainerid'=>$trainerid
      ];
      $query=DB::table('ptmember')->where('ptmemberid',$memberid)->update($update);

      // echo  $memberid;
   }
    public function assignmembertotrainer(){

      $employees=Employee::where('roleid','4')->get()->all();
      $members=Member::get()->all();

    return view('admin.Assign_Member_To_PT',compact('members','employees'));
   }
}
