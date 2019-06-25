<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <style>

      body{
      text-align: justify;
      text-justify: inter-word;
      margin-left: 20px;
      }
      footer {
      position: fixed; 
      bottom: -30px; 
      left: 0px; 
      right: 0px;
      height: 50px; 

      /** Extra personal styles **/
      background-color: white;
      color: black;
     
      text-align: right;
      }
       footer.page:after { content: counter(page, upper-roman); }
      td {
      border-bottom: 1px solid #ddd;
      border-right:1px thin gray;
      margin: 5px;
      border-color: gray;


      }
      p{
      line-height: 20px;
      }

      table {


      }
      .pagenum:before {
    content: counter(page);
}
    </style>
    <body>
      @php $PAGE_NUM = 1; @endphp
        <footer>
          <div  style="text-align: left;"> Page  <span class="pagenum"></span></div>
         
        <span style="text-align:center">signature</span>
        </footer>
       <div style="float: right">
                <img style="width: 100px; height: 120px;" src="images/fitness5.png">
            </div>
      

        <div>
         
            <div style="float: left; margin-top: -20px;">
                <p><b><font size="4">Fitness 5</font></b>
                  <br>
               
C/o. “Siddhi Vinayak Health Care",<br/>  
35/148, Laxmi Vijay Premises <br/>
Laxmi Industrial Estate.<br/>
New Link Road. Andheri (W).<br/> Mumbai 400053
Mo. : +917048880005
                </p>
            </div>
      
        </div>
        <br>
      
        <div class="content" style="margin-top: 90px;">
          <br>
<h2 style="margin-left: 200px;">Consent Form of {{  ucfirst($request->firstname)}} {{  ucfirst($request->lastname)}}</h2>
  
        <br>
  

  <table style="margin: 5px;" width=100% cellpadding="5px;" cellspacing="0px">

<thead></thead>
                 <tbody>
<tr>
 <td style="border-color: gray;border-left:thick solid;border-right:thick solid;border-top:thick solid;border-color: gray;">Member Name</td>
    
 <td style="border-color: gray;border-top:thick solid;border-right:thick solid;border-color: gray;">  {{  ucfirst($request->firstname)}} {{  ucfirst($request->lastname)}} </td>
</tr>
<tr> 
  <td style="border-color: gray;border-left:thick solid;border-right:1px gray;border-color: gray;"> Cell No. </td> 
<td style="border-color: gray;border-left:thick solid;border-right:thick solid;border-color: gray;">{{    $request->phone}}</td></tr>
<tr> <td style="border-color: gray;border-left:thick solid;border-color: gray;"> Member Id </td> <td style="border-color: gray;border-left:thick solid;border-right:thick solid;border-color: gray;">{{$request->memberid}}</td></tr>
<tr> <td style="border-color: gray;border-left:thick solid;border-color: gray;"> Address </td> <td style="border-color: gray;border-left:thick solid;border-right:thick solid;border-color: gray;">{{$request->Address}} </td></tr>

<tr>
<td style="border-color: gray;border-left:thick solid;border-color: gray;">Email </td><u> <td style="border-color: gray;border-left:thick solid;border-right:thick solid;border-color: gray;"> {{$request->email}}</td></tr>
<tr>
<td style="border-color: gray;border-left:thick solid;border-bottom:thick solid;border-color: gray;">Emergency 
Contact No </td><u> <td style="border-color: gray;border-bottom:thick solid;border-left:thick solid;border-right:thick solid;border-color: gray;">
{{$request->emergancyphoneno}}</td></tr>

          </tbody>
            </table>
              <br>
</div>
         
          <!-- general form elements -->
    <div>
     
      </div>

        <div>
          <h3>In consideration of my desire to engage in an exercise programme at the FITNESS5.  <br>
          I understand and agree to following :</h3>
          <span class="focus-input100"></span>
        </div>

        <div>
        
<center><b>TERMS & CONDITIONS</b></center>

<div>
    <ul style="circle" style="justify-content:center; line-height:25px;">
<li style="line-height:25px;"> Fitness 5 reserves the rights of admission. </li>
<li style="line-height:25px;">Any member found ignoring rules and regulation of the club would be asked to leave if necessary.</li>
<li style="line-height:25px;">Member must be at least 16 years of age, unless if specified otherwise, under the supervision by Fitness 5.</li>
<li style="line-height:25px;">Fitness 5 has the rights to change these rules and regulation at any time.</li>
<li style="line-height:25px;"> Fitness 5 cannot be held accountable for for loss or theft of any personal belongings, even if locked in a locker.</li>
<li style="line-height:25px;"> IF the  RIFD band is damaged or misplaced the gym will charge the member for the new band .</li>
<br><br>
<li style="line-height:25px;"> Each Member needs to empty the locker and remove the padlock when leaving the facility. Fitness 5 Gym will open and empty lockers if the Member is not in the facility. The facility shall be used for training purposes only. No other activity will be allowed, and violations will be sanctioned. For example, sleeping and lingering are not allowed. Consumption of alcohol, tobacco or illegal substances is not allowed. Working out under the influence is not allowed. Conducting business or paid services is not allowed. Any kind of steroids are prohibited in the gym premises or in the washrooms .Any individual caught in this crime the manegment will terminate the membership.</li>

<li style="line-height:25px;"> The Member shall respect the behavioral and operating principles and follow them on all occasions. This includes, but is not limited to: </li>
  <ol style="line-height:25px;margin-left: 20px;">
<li> Wearing appropriate workout attire akin to workout tees, pants, shorts& shoes during your workout.</li> 
<li> Outside shoes strictly not allowed inside gym premises. Please bring extra shoes with you to do your workout.</li>
<li>Using a towel is compulsary at every workout and leaving machines and surfaces clean after usage. </li> 
<li> Behaving in a friendly and respectful manner towards the other members in the gym as well as the staff.</li>
<li>  Consumption of outside food is prohibited in the gym premises.
</ol></li></ol></ul>

For further detailed terms and conditions please visit our website www.fitness5.in
<p><br>
<!-- 
___ I hereby agree to all the membership terms and conditions mentioned above and further more detailed rules and regulations on the website: www.fitness5.in -->


<center><b>WAIVER</b></center><br>
<!-- <ol style="line-height:25px;"> -->
  <ol>
<li> PURPOSE & EXPLANATION PROCEDURE 

<ul> <li><p>I hereby consent voluntarily in an acceptable plan of group or personal training fitness instruction.I understand that this program may or may not benefit my physical fitness or general health. I recognise that involvement in the exercise will allow me to properly perform conditioning exercise, use fitness equipment, and regulate physical effort. </li>
<li><p>I understand that I may undergo exercise tests for fitness assessment prior to the start of fitness participation in order to evaluate my present level of fitness, develop fitness program for me and monitoring my progress.</p></li>
<li><p>I understand that while I exercise, a fitness instructor will periodically monitor my performance to track my progress. I also understand that the fitness instructor may alter my exercise planas per my health condition for my own benefit. Ihereby state that I have been adviced and I agree to inform the trainer of my body symptoms like soreness etc.</li>
<li><p> I understand the that fitness training is an activity that involves physical contactto ensure proper technique and body alignment is maintined during the training.I express my consent to the physical contact for these reasons. </li></ul>

<li>  RISKS
<ul> <li><p> I understand and have been informed about the possibility of adverse changes occurring during exercise including, but not limited to: abnormal blood pressure, fainting, dizziness, and disorders of heart rhythm and very rare instance of heart attack, stroke or even death.</li> 
<li><p>I have been informed and I understand that there exists the risk of severe injury, including but not limited to, injuries to the muscles, ligaments, tendons and joint of the body. I have been told that every effort will be made to minimize this occurrencebut proper staff assessments of my condition before each exercise class, by staff supervision during exercise and by my own control of exercise efforts. </li>
<li><p> I fully understand the risks associated with exercise, including the risk of bodily injury, heart attack, stroke or even death but knowing those risks, it is my desire to participate as here in indicated.</li>
<li><p>If risks are identified, the client will be required to provide the trainer with an official physicians referral documents stating that the client has been cleared to engage in a physical activity program, Untill then trainers are not permitted to train participants under any conditions or circumstances.</li></ul>

<li> ACCESS & SECURITY
<p>I understand and agree to camera surveillance in the Fitness 5 Gym facilities, where the data will be stored for 7 days, then deleted. I agree for a registered 3D fingerprint. The 3D fingerprint identification is done without possibility of personal identification or fingerprint reproduction. I guarantee to never let in any other member, nor another person into the Fitness 5 Gym premises. </li>

<li>  CONFIDENTALITY & USE OF INFORMATION
<p>I understand that information obtainedabout me in this fitness program will be a privilege and kept confidential and consequently not be realised or revealed to any person without my consent. I however, do agree to the use of any information that is not personally identifiable with me for research and statistical purpose, as long as same does not identify me or provide facts that could lead to my identification. I also agree to the use of any information for the purpose of consolation with other healthfulness professionals, including my Doctor. Any other information obtained, however, will be used only by the program staff in the course of prescribing exercise for me and evaluating my progress in the program.</li>

<li>  TRADINESS & CANCELLATION&FROZEN MEMBERSHIP
<p>I understand and agree that:
<ul><li>All clients and trainers are encouraged to be prompt. If a client arrives late, this time will be deducted from the class. Similarly, if trainer arrives late, the amount of time will be added (Or an extended class or prorated toward a new class, I understand that I will be charged for any unused classes that I miss, if the trainers done not contact me at least 24 hours in advance to cancel or reschedules the class. I will receive a complimentary class; we request that class be used within six months of the date issue)</li> 
<li><p>I can opt for transferring your residual days in your membership plan for a nominal fee of Rs.3999/- Plus taxes to a non-member who is not an ex-member of Fitness5.</li> 
<li> All membershipsare non-refundable and non-transferable.</li>

<li><p> I can freeze my membership plan for a nominal fee of Rs. 999/- plus taxesfor 
i) medical reasons, upon presentation of a medical certificate, or 
ii) military service, upon presentation of the official call to duty. The membership can be put on hold for minimum 15 days to maximum 30 days, after which the membership is automatically reactivated, available only in a 6 month or 12 month membership plan.The membership cannot be frozen in retrospect.</li></ul></li>

<li>  PRICE CHANGES
<p>I understand that all prices are fixed for the duration of the contract. A price change can be implemented for the prolongation of a contract. In such cases the price change is communicated via email 15 days before the effective date. </li>

<li>  INSURANCE
<p>I confirm that he/she holds the necessary insurances to cover any accident or training incident. I understand that Fitness 5 Gym shall not be subject to any claim, demand, or injury whatsoever with regard to the assessment of the Member’s health condition or for any injury arising out of the my disability, impairment or ailment. </li>

<li>LIABILITY
<p>I understand that I shall be liable for any Fitness 5 Gym property damage and/or personal injury caused by me at the Fitness 5 Gym premises. It shall be my obligation to pay for any costs involved upon presentation of a statement thereof.</li> 
</ol>
</ul>
</ul> 
 I Release, waive, discharge and covenant not to sue, Fitness 5 Gym, its affiliated organizations and governing bodies, their officers, instructors and personnel, other members of the organizations, participants, supervisors, coaches, sponsoring organizations or their agents, and if applicable, owners and leasers of the premises from any and all liability to the undersigned, his or her heirs and next of kin for any and all claims, demands, losses and damages which may be sustained and suffered on account of injury, including death or damage to property, caused or alleged to be caused in whole or in part by the negligence of the releases or otherwise.
<br><p>  I HAVE READ THE ABOVE WARNING, WAIVER, RELEASE, AND ASSUMPTION OF RISK. I FULLY UNDERSTAND ITS CONTENTS, AND THAT I HAVE GIVEN UP SUBSTANTIAL RIGHTS BY SIGNING IT. I HEREBY SIGN IT VOLUNTARILY WITHOUT ANY INDUCEMENT, ASSURANCE, OR GUARANTEE BEING MADE TO ME AND INTEND MY SIGNATURE TO BE A COMPLETE AND UNCONDITIONAL RELEASE OF ALL LIABILITY.

</div>
   
        </div>

        <div>
                 
        </div><br/><br/>
        <table  width="100%" style="margin-left: 30px;"> 
          <tr>
            <td style="border:none">   {{  ucfirst($request->firstname)}} {{  ucfirst($request->lastname)}}</td>
            <td style="border:none"></td>
            <td style="border:none"></td>
          </tr>
          <tr>
            <td style="border:none">
          
                SIGNATURE<br/>(MEMBER)
             
            </td>
          <td  style="border:none">   SIGNATURE<br/>(WITNESS)</td>   

          <td  style="border:none">    TEAM FITNESS5</td></tr></table>
      </div>


    </div>
  </section>

</div>
    </body>
</html>  
         