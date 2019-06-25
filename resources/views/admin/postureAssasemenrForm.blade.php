@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- left column -->
<style type="text/css">
  table {
    empty-cells: show;
    border: 1px solid #000;
}

table td,
table th {
    min-width: 2em;
    min-height: 2em;
    border: 1px solid #000;
}
</style>
  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>PHYSIOFIT</h2></section>
          <!-- general form elements -->
           <div class="content">
          @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
             @if ($message = Session::get('message'))
    @if($message=="Succesfully added")
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message=="User Is Already Exits")
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
    @endif
@endif 
      <form action="{{ url('addMember') }}" method="post" enctype="multipart/form-data">  {{ csrf_field() }}
          <div class="box box-primary" id="firststep">

            <div class="box-header with-border">
             <center><u><b class="box-title">FITNESS ASSESSMENT FORM</b></u></center> 
            </div>
            <!-- /.box-header -->
            <h4 class="box-title">&emsp;<u>For Office Use Only</u></h3>
            <div class="box-body" >
              <div class="col-md-12"> 
                <div class="form-inline ">
              <label>DOA</label>
                <input type="text"  name="doa" class="form-control"placeholder="DOA"  class="span11" />
               <label>DEPT</label>
                <input type="text"  name="doa" class="form-control"placeholder="DEPT"  class="span11" />
                <label>PACKAGE</label>
                <input type="text"  name="doa" class="form-control"placeholder="PACKAGE"  class="span11" />
                <label>THERAPIST</label>
                <input type="text"  name="doa" class="form-control"placeholder="THERAPIST"  class="span11" />
              </div> 
             <hr style="border-width: 2px;border-color: black">
            </div>
              <div class="col-lg-6"><h4><u><b>Personal Details</b></u></h4> 
            

             <div class="form-group">
              <label>Name</label>
             
                <input type="text"  name="firstname" class="form-control"placeholder="name"  class="span11" />
              </div>
             <div class="form-group">
              <label>AGE</label>
             
                <input type="text"  name="lastname" class="form-control"placeholder="age"  class="span11" />
              </div>
               <div class="form-group">
              <label>PROFESSION</label>
             
                <input type="text"  name="username" id="username" class="form-control"placeholder="profession"  class="span11" required="" />
              </div>   <div class="form-group">
             <label>Address</label>
             
            <textarea rows="2" cols="20" name="Address" wrap="soft" class="form-control"  placeholder="Address" class="span11"></textarea>
               </div>

                    <div class="form-group">  <label>Gender</label>
                  
                    <label>
                      <input type="radio" name="gender"  value="female">
                      Female
                    </label>
                
                    <label>
                      <input type="radio" name="gender"  value="Male">
                      Male
                    </label>
                  </div>
             <h4><u>GOAL OF PROGRAMMING</u></h4>      
            <div class="form-group">
               <select  class="form-control" name="goal"><option disabled="" selected>--Select Any--</option>
                   <option value="BODY BUILDING">BODY BULDING</option>
                     <option value="We Called Them">WEIGHT GAIN</option>
                       <option value="Friends/Family">WEIGHT LOSS</option>
                         <option value="Via Internet">HEIGHT</option>
                           <option value="Word Of Mouth">OTHERS</option>
                           
                 </select>
             </div>
           <h4><u>LIFE STYLE HISTORY</u></h4>      
            <div class="form-group">
              <label>WAKE UP TIME:</label>
               <input type="time" name="wakeuptime" class="form-control">
             </div>
               <div class="form-group">
              <label>YOUR DAILY ROUTINE ACTIVITY</label>
               <input type="text" name="dailyroutine" class="form-control"><h5>(eg : Office work / Household work / Others)</h5>
             </div>
               <div class="form-group">
             <label>YOUR DAILY ACTIVITY LEVEL ? </label> 
             <br>
                <label>
                      <input type="radio" name="rank"  value="h1">                    High
                    </label>
                
                    <label>
                      <input type="radio" name="rank"  value="m1">                     Med
                    </label>

                    <label>
                      <input type="radio" name="rank"  value="l1">                      Low
                    </label>
               </div>
                 <div class="form-group">
              <label>SLEEPING TIME</label>
               <input type="time" name="sleeptime" class="form-control">
             </div>
           <hr style="border-width: 2px;border-color: black">
                 <div class="raw-md-6"><h4><u><b>Medical History</b></u></h4>     <div class="form-group"> 
                  <label>HAVE YOU DONE EXERCISE BEFORE ?</label>
                  <br>
                    <label>
                      <input type="radio" name="exercisebefore"  value="yes">
                      Yes
                    </label>
                    <label>
                      <input type="radio" name="exercisebefore"  value="no">
                      No
                    </label>
                  </div>
                    <div class="form-group">
              <label> HAVE YOU SUFFERING FROM HEART PROBLEMS, HIGH BLOOD PRESSURE,
DIEBETES OR THYROID ? (if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
                  <div class="form-group">
              <label>  HAVE YOU SUFFERED FROM FEVER , OR ANY DISEASES ? (if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
               <div class="form-group">
              <label>   ARE YOU TAKING ANY MEDICINE ?  (if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
             <div class="form-group">
              <label>    ARE YOU SUFFERING FROM BACK PAIN, NECK PAIN, KNEE PAIN OR ANY
ORTHOPAEDIC PROBLEMS ? (if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
             <div class="form-group">
              <label> ARE YOU OVERWEIGHT OR UNDERWEIGHT?
              </label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
              <div class="form-group">
              <label>  HAVE YOU GAIN OR LOSS WEIGHT IN LAST 3 MONTHS ? (if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
             <div class="form-group">
              <label>  ANY MEMEBERS OF YOUR FAMILY IS OVERWEIGHT? (if Yes than Specify relation)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
             <div class="form-group"> 
                  <label>DO YOU SMOKE ?</label>
                  <br>
                    <label>
                      <input type="radio" name="smoke"  value="yes">
                      Yes
                    </label>
                    <label>
                      <input type="radio" name="smoke"  value="no">
                      No
                    </label>
                </div>
                     <div class="form-group"> 
                  <label>ARE YOU TAKING TOBACCO OR ALCOHOl ?</label>
                  <br>
                    <label>
                      <input type="radio" name="tobaccoalcohol"  value="yes">
                      Yes
                    </label>
                    <label>
                      <input type="radio" name="tobaccoalcohol"  value="no">
                      No
                    </label>
                </div>
                 <h4><u><b>FOR FEMALE</b></u></h4> 
                    <div class="form-group"> 
                  <label>ARE YOU PREGNANT ? </label>
                  <br>
                    <label>
                      <input type="radio" name="pregnant"  value="yes">
                      Yes
                    </label>
                    <label>
                      <input type="radio" name="pregnant"  value="no">
                      No
                    </label>
                </div>
                 <div class="form-group"> 
                  <label> HAVE YOU GIVEN CHILD BIRTH SINCE LAST 6 WEEKS ? </label>
                  <br>
                    <label>
                      <input type="radio" name="birthin6"  value="yes">
                      Yes
                    </label>
                    <label>
                      <input type="radio" name="birthin6"  value="no">
                      No
                    </label>
                </div>
                  <div class="form-group">
              <label>   ARE YOU SUFFERING FROM THYROID, PCOD, IRREGULER MENSES OR ANY
HORMONAL ISSUES ?
(if Yes than Specify)</label>
               <input type="text" name="sleeptime" class="form-control">
             </div>
               
               
              </div>

              </div>
                
              <div class="col-lg-6"><h4><u><b>DIET HISTORY</b></u></h4>
              <div class="form-group">
             <label>WHEN YOU GET UP</label>
             
            <input type="text"  name="getup" class="form-control" placeholder="get up"  class="span11" />
               </div>
             <div class="form-group">
              <label>BREAKFAST</label>
             
                <input type="text"  name="breakfast" class="form-control"placeholder="breakfast"  class="span11" />
              </div>
             <div class="form-group">
             <label>LUNCH</label>
             
                <input type="text" name="lunch" class="form-control number" placeholder="lunch"  class="span11" />
               </div>
            <div class="form-group">
             <label>EVENING</label>
             
                <input type="text" name="evening" class="form-control number" placeholder="evening"  class="span11" />
               </div>
                <div class="form-group">
             <label>DINNER</label>
             
                <input type="text" name="dinner" class="form-control" placeholder="dinner"  class="span11" />
               </div>
             
            <div class="form-group">
             <label>POST DINNER</label>
             
               <input type="text" name="postdinner" class="form-control" placeholder="postdinner"  class="span4" />
               </div>
               <h4><u>VITALS</u></h4>
               <div class="form-group">
               <table>
               <tr><td><input type="text" name="RHR" class="form-control" placeholder="RHR"  class="span4" /></td>
               <td><input type="text" name="MHR" class="form-control" placeholder="MHR"  class="span4" /></td></tr>
               <tr><td><input type="text" name="HRR" class="form-control" placeholder="HRR"  class="span4" /></td>
               <td><input type="text" name="RBP" class="form-control" placeholder="RBP"  class="span4" /></td></tr>
               </table>
               </div>
               <h4><u><b>BODY COMPOSITION</b></u></h4>
               <div class="form-group">
                <table style="border-radius:2px;" border="1">
    <thead> </thead> <tbody>
        <tr>
            <td colspan="4" size="5"><label> HEIGHT</label></td>
            <td colspan="4"> <input type="text" name="" size="23"></td>
       


        </tr>
        <tr>
            <td colspan="4"  size="4"><label> WEIGHT</label></td>
            <td> <input type="text" name="" size="4" ></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>


        </tr>
   
   
        <tr>
            <td colspan="3"><label> BMI</label></td>
            <td> <input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>

    </tbody>
  </table>
  <br>
  <table>
    <tbody>
       <tr>
           <td><label>BODY FAT(%):</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
            <td><label>VISC FAT (%) </label></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
           
         </tr>
         <tr>
          <td><label>BMR:</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
    </tbody>
</table>

               </div>
                <h4><u><b>BODY CIRCUMFERENCE</b></u></h4>
                 <h4><u><b>STRENGHT TEST</b></u></h4>
                 <table>
    <tbody>
       <tr>
           <td><label>BENCH PRESS:</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
            <td><label>SQUAT</label></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
           
         </tr>
         <tr>
          <td><label>O/H PRESS</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
    </tbody>
</table>
<h4><u><b>STRENGHT - ENDURANCE TEST</b></u></h4>
                 <table>
    <tbody>
       <tr>
           <td><label>PUSH UPS</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
            <td><label>CURL UPS</label></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
           
         </tr>
         <tr>
          <td><label>PLANK
HOLD</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
    </tbody>
</table>
<h4><u><b>FLEXIBILITY</b></u></h4>
   <table>
    <tbody>
       <tr>
           <td><label>SITAND REAC</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
            <td><label>MOBILITY</label></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
           
         </tr>
         <tr>
          <td><label>OTHER</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
    </tbody>
</table><h4><u><b>STATIC POSTURE</b></u></h4>
  <table>
    <tbody>
       <tr>
           <td><label>ANTERIR VIEW</label></td>
            <td colspan="6"><input type="text" name="" size="40"></td>
            
         </tr>
         <tr>
            <td><label>HEAD TILT TO</label></td>
             <td ><b>L</b></td>
             <td ><b>R</b></td>
              <td colspan="4"><input type="" name="" size="33"></td>
             
            <!-- <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td> -->
           
         </tr>
         <tr>
          <td><label>HIGH SHOULDER</label></td>
           <td ><b>L</b></td>
             <td ><b>R</b></td>
              <td colspan="4"><input type="" name="" size="33"></td>
         </tr>
    </tbody>
</table>
<h4><u><b>STRENGHT - ENDURANCE TEST</b></u></h4>
                 <table>
    <tbody>
       <tr>
           <td><label>UPPER
ARM</label></td>
              
             <td ><b>L</b></td>
             <td ><b>R</b></td>
             
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
            <td><label>CHEST</label></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
          
           
         </tr>
         <tr>
          <td><label>PLANK
HOLD</label></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
         <tr>
           <td rowspan="2"><label>THIGH</label></td>
              
             <td ><b>L</b></td>
             <td ><b>R</b></td>
             
            <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
             <td><input type="text" name="" size="4"></td>
            <td><input type="text" name="" size="4"></td>
         </tr>
    </tbody>
</table>
                
               </div>
           <hr style="border-width: 2px;border-color: black">
           </div>
             
           <div class="form-group">
                <div class="col-sm-offset-3">
              
         <button type="submit" class="btn bg-blue margin">
         Save</button>
         <a href="{{ url('members') }}"class="btn bg-red margin">Cancel</a>

        </div></div>
          </div> 
        </div>
          </form>
         
                   
                  </div>-->
               
              
             
             
         <!--  </div>
        </div>-->
            
            <!-- /.box-body -->
        <!-- </form>  
  </div>
  </div>
  <div class="modal fade" id="modal-default" style="display: none">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>-->
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>  
</section>

@endsection