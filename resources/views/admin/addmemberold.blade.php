  <div class="content-wrapper">
   
     
         <section class="content-header"><h2>Add Member</h2></section>
          <!-- general form elements -->
           <div class="content">
          @if ($errors->any())
            <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">×</button> 
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
    
          <div class="box box-primary" id="firststep">

            <div class="box-header with-border">
              <h3 class="box-title">Add Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" ><div class="col-lg-6"><h4><u>Personal Details</u></h4> 
              <div class="form-group">
             <label>Date</label>
             
                <input placeholder="date" type="date" class="form-control" name="Created_date" class="span11" value="{{Carbon\Carbon::today()->format('Y-m-d')}}">
            
            </div>

             <div class="form-group">
              <label>First Name</label>
             
                <input type="text"  name="firstname" id="firstname" class="form-control"placeholder="Firstname"  class="span11" required="" />
              </div>
             <div class="form-group">
              <label>LastName</label>
             
                <input type="text"  name="lastname" id="lastname"class="form-control"placeholder="LastName"  class="span11" required="" />
              </div>
               <div class="form-group">
              <label>User Name</label>
             
                <input type="text"  name="username" id="username" class="form-control"placeholder="User Name"  class="span11" required="" /><span id="error_username"></span>
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
            <div class="form-group">
              <label>Email</label>
             
                <input type="email"  name="email" class="form-control"placeholder="Email Id"  class="span11" />
              </div><div class="form-group">
              <label>Hear About..</label>
             
                   <select  class="form-control" name="how_know_aboutus"><option disabled="" selected>--Select Any--</option>
                   <option value="Fitness Five Member">Fitness Five Member</option>
                     <option value="We Called Them">We Called Them</option>
                       <option value="Friends/Family">Friends/Family</option>
                         <option value="Via Internet">Via Internet</option>
                           <option value="Word Of Mouth">Word Of Mouth</option>
                           <option value="Radio Advertise">Radio Advertise</option>
                           <option value="Magazine Advertise">Magazine Advertise</option>
                             <option value="Other">Other</option>
                 </select>
              </div>
              <div class="form-group">
             <label>Cell Phone Number</label>
             
                <input type="text" name="CellPhoneNumber" id="MobileNo" minlength="10" maxlength="10"
 class="form-control number" placeholder="Cell Phone Number" required=""  class="span11" /><span class="errmsg"></span>
               </div>
               <div class="form-group">
             <label>Profession</label>
             
                <input type="text" class="form-control" name="profession" placeholder="Profession" class="span11" />
             
            </div>
              <div class="form-group">
             <label>Birthdate</label>
             
                <input placeholder="Birthdate" type="date" class="form-control" name="birthday" class="span11">
            
            </div>
              <div class="form-group">
             <label>Anniversary</label>
             
                <input placeholder="Anniversary" type="date" class="form-control" name="anniversary" class="span11">
            
            </div>
              <div class="form-group">
             <label>Timing</label><br>
             <span><label>From</label></span>
             <select type="time"class="form-control" name="working_hour_from_1" id="fromtime">
              <option value="06:00">06:00 AM</option>
              <option value="07:00">07:00 AM</option>
              <option value="08:00">08:00 AM</option>
              <option value="09:00">09:00 AM</option>
              <option value="10:00">10:00 AM</option>
              <option value="11:00">11:00 AM</option>
              <option value="12:00">12:00 AM</option>
              <option value="13:00">01:00 PM</option>
              <option value="14:00">02:00 PM</option>
              <option value="15:00">03:00 PM</option>
              <option value="16:00">04:00 PM</option>
              <option value="17:00">05:00 PM</option>
              <option value="18:00">06:00 PM</option>
              <option value="19:00">07:00 PM</option>
              <option value="20:00">08:00 PM</option>
              <option value="21:00">09:00 PM</option>
              <option value="22:00">10:00 PM</option></select>  
                  
             <label>To</label>
                <select type="time"class="form-control" id="totime" name="working_hour_to_1">
              <option value="07:00">07:00 AM</option>
              <option value="08:00">08:00 AM</option>
              <option value="09:00">09:00 AM</option>
              <option value="10:00">10:00 AM</option>
              <option value="11:00">11:00 AM</option>
              <option value="12:00">12:00 AM</option>
              <option value="13:00">01:00 PM</option>
              <option value="14:00">02:00 PM</option>
              <option value="15:00">03:00 PM</option>
              <option value="16:00">04:00 PM</option>
              <option value="17:00">05:00 PM</option>
              <option value="18:00">06:00 PM</option>
              <option value="19:00">07:00 PM</option>
              <option value="20:00">08:00 PM</option>
              <option value="21:00">09:00 PM</option>
              <option value="22:00">10:00 PM</option>
              <option value="22:00">11:00 PM</option>
            </select>  
                <div class="form-group">
             <label>Are you come by any company ?</label>
             (if Yes than select)
            <select name="bycompany"type="text"class="form-control">
               <option disabled="" selected>--Select Any--</option>
              @foreach($company as $comp)

              <option value="{{$comp->id}}">{{$comp->companyName}}</option>
              @endforeach
            </select>
               </div>
                <!-- <input type="time" class="form-control"  name="working_hour_to_1"
                min="9:00 pm" default="09:pm" value="12:00"  /> -->
        
              
         
            </div><hr style="border-width: 2px;border-color: black">
                 <div class="raw-md-6"><h4><u>Medical Information</u></h4>
              <div class="form-group">
             <label>A</label>
             
                <input type="text" name="SpecificGoalsa" class="form-control"  class="span10" />
               </div>
               <div class="form-group">
             <label>B</label>
             
                <input type="text" name="SpecificGoalsb" class="form-control"  class="span10" />
               </div>
               <div class="form-group">
             <label>C</label>
             
                <input type="text" name="SpecificGoalsc" class="form-control"  class="span10" />
               </div>
           
           </div>  
           <hr style="border-width: 2px;border-color: black">
                 <div class="raw-md-6"><h4><u>Medical Information</u></h4> <label>What areas can personal trainer can help you?</label>
                  <div class="box content-fit-box">
                 
                  <br>
                  <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info"><tr>
                <td><label>
                     <input type="checkbox" name="fitnessgoals[]" class="badgebox" value="1"> LoseBodyFat</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="2"> DevelopMuscle</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="3"> RehabilitateAnInjury </label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="4"> ImproveBalance </label></td></tr>
                <tr><td><label>
                     <input type="checkbox" name="fitnessgoals[]"  value="5"> ImproveFlexibility</label></td>
                
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="6"> NutritionalEducation</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="7"> DesignBeginnersProgram</label></td>
                
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="8"> DesignAdvancedProgram</label></td></tr>
                
                <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="9"> TrainSpecific</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="10"> Safety</label></td></tr>
                 <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="11"> MakeExerciseFun</label></td>
                <td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="12"> Motivation</label></td></tr>
                  <tr><td><label>
                    <input type="checkbox" name="fitnessgoals[]"  value="1"> Other</label></td>
                    <td><textarea  name="OtherHelp" placeholder="OtherHelp"class="span2"></textarea></td></tr></table></div> </div> 
            
                       <!--    Anniversary SpecificGoalsa  SpecificGoalsb  SpecificGoalsc  -->     
           </div> 
              <div class="col-lg-6"><h4><u>Contact Details</u></h4>
              <div class="form-group">
             <label>Address</label>
             
            <textarea rows="2" cols="20" name="Address" wrap="soft" class="form-control"  placeholder="Address" class="span11"></textarea>
               </div>
             <div class="form-group">
              <label>City</label>
             
                <input type="text"  name="City" class="form-control"placeholder="City"  class="span11" />
              </div>
             <div class="form-group">
           
          
             <label>Home Phone Number</label>
             
                <input type="text" name="HomePhoneNumber" class="form-control number" placeholder="Home Phone Number"  minlength="10" maxlength="10" class="span11" />
                <span class="errmsg"></span>
               </div>
           
                 
            
            <div class="form-group">
             <label>Office Phone Number</label>
             
                <input type="text" name="OfficePhoneNumber" class="form-control number" placeholder="Office Phone Number"  minlength="10" maxlength="10" class="span11" />
                <span class="errmsg"></span>
               </div>
           <hr style="border-width: 2px;border-color: black">
           </div>
               <div class="col-md-6"><h4><u>Contact Details Emergancy</u></h4>
                
             <div class="form-group">
             <label>Emergancy Contact Name</label>
             
                <input type="text" name="emergancyname"  class="form-control" placeholder="EmergancyName"   class="span11" />
               </div>
            
             <div class="form-group">
             <label>Emergancy Contact Relation</label>
             
                <input type="text" name="emergancyrelation" class="form-control" placeholder="EmergancyRelation"   class="span11" />
               </div>
           
             <div class="form-group">
             <label>Emergancy Contact Address</label>
             
            <textarea rows="2" cols="20" name="emergancyaddress" wrap="soft" class="form-control"  placeholder="Emergancy Address" class="span11"></textarea>
               </div>
             <div class="form-group">
             <label>Emergancy Contact Number</label>
             
                <input type="text" name="EmergancyPhoneNumber" class="form-control number" placeholder="EmergancyPhoneNumber"  minlength="10" maxlength="10" class="span11" />&nbsp;<span class="errmsg"></span>
               </div>
     
              <div class="form-group">
             <label>Photo</label>
             
                <input type="file" name="file"class="form-control"  class="span11" />
               </div>
                 <hr style="border-width: 2px;border-color: black">
             </div>
               <div class="col-md-6"><h4><u>Exercise Program</u></h4>
                <div class="box content-fit-box">
             <div class="form-group">  <label>What activities interest you ?</label>
              <table class="table table-bordered table-striped dataTable table-wrapper" role="grid" aria-describedby="example1_info"><tr>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="1"> Baseball </label></td>
                    <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="2"> Basketball </label></td> 
                <td><label>
                    <input type="checkbox" name="exerciseprograms]"  value="3"> Boxing</label></td></tr>
                    
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="4"> KickBoxing</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="5"> Skiing</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="6"> Football</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="7"> Golf</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="8"> Hiking</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="9"> Pilates</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="10"> Racquetball</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="11">IndoorCycling</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="12"> Kayaking</label></td> </tr>
                 <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="13"> RockClimbing</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="14"> Running</label></td>
                 <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="15"> Soccer</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="16"> Swimming</label></td>

                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="17"> Tennis</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="18"> Triathlon</label></td></tr>
               <tr> <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="19"> Walking</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="20"> WeightTrainning</label></td>
                <td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="21"> Yoga</label></td></tr>
                <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="22"> Stretching</label></td></tr>
               <tr><td><label>
                    <input type="checkbox" name="exerciseprograms[]"  value="23"> Other</label></td>
                    <td><textarea name="OtherActivity" placeholder="OtherActivity"class="span2"></textarea></td></tr></table></div>

                    <!-- OtherActivity
                <td><label>
                    <input type="checkbox" name=""  value="1g">OftenWeekExercise</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                <td><label>
                    <input type="checkbox" name=""  value="1g">Walking</label></td>
                    </table>
                  </div>
                    <div class="form-group">
                      <label>What activities interest you ?</label>
                      <tr>
             <label>Emergancy Phone Number</label>
          <td><input type="checkbox" name="terms[]" value="1el></label></td>
 -->
   
               </div>
           
            <div class="form-group">
             <label>How often a week whould you like to exercise ?</label>
             
                <input type="text" name="OftenWeekExercise" class="form-control" placeholder="Often Week Exercise" class="span11" />
               </div>
           <div class="form-group">
             <label>Where do you rank in health in your life ?</label> 
             <br>
                <label>
                      <input type="radio" name="rank"  value="h1">                    HighPriority
                    </label>
                
                    <label>
                      <input type="radio" name="rank"  value="m1">                     MediumPriority
                    </label>

                    <label>
                      <input type="radio" name="rank"  value="l1">                      LowPriority
                    </label>
               </div>
                <div class="form-group">
             <label>How commited are you towards reaching your goals ?</label>
             <br>
                <label>
                      <input type="radio" name="goal"  value="v1">                   Very
                    </label>
                
                    <label>
                      <input type="radio" name="goal"  value="s1">                    Semi
                    </label>

                    <label>
                      <input type="radio" name="goal"  value="b1">                      Barely
                    </label>
               </div>
               <div class="form-group">
  <br>
<div class="field" align="left">
  <h3>ID Proofs </h3><h5>(can attach more than one):</h5> 
  <input type="file" id="files" name="attachments[]" multiple />

  <ul id="fn"></ul>
  <i id="file"></i>
</div><br>
               </div>
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