<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <style>
        td {
            border-bottom: 1px solid #ddd;
            margin: 5px;
            border-color: gray;

        }

    </style>
    <body>
        <div>
                <div style="float: left">
                <img style="width: 100px" src="images/fitness5.png">
            </div>
            <div style="float: left;margin-left: 8px;">
                <b><font size="3">Fitness 5</font></b>
            <br>   
            <font size="2">
C/o. “Siddhi Vinayak Health Care",<br/>  
35/148, Laxmi Vijay Premises <br/>
Laxmi Industrial Estate.<br/>
New Link Road. Andheri (W).<br/> Mumbai 400053
Mo. : +917048880005</font>
                </p>
            </div>
            <div style="float: right">
                <b>Invoice No:</b>  {{$payment[0]->receiptno}} 
                <br>
                <b>Date:</b>  {{$request->paymentdate}}
                <br>
                <b>MemberId:</b>  {{$payment[0]->memberid}}
                <br>
               
                <b>Mobile No.</b>  {{$phoneno}}
                @if($companyName)
                <br>  {{ $companyName  }}
                <br>
                <b>C/O.</b> {{ucfirst($member->firstname)}} {{ucfirst($member->lastname)}}
                <br> <b>GST No: </b> {{ $Gstno }}
                @else
                <br>
                <b>{{ ucfirst($member->firstname)}} {{ucfirst($member->lastname)}}</b>
              
                @endif
            </div>
        
        </div>
        <br>
        <br>

        <div>
       <br>
       <br>
            <font size="2">
                
                 <table style="margin: 5px;  margin-top:70px;   " width=100% cellpadding="5px;" cellspacing="0px">

                <thead>
                    <tr><th style="border:none;"><font size="3">Package Information</font></th></tr>
                    <tr style=" border-left: thick solid; border-top: thick solid;border-bottom:bold solid; border:1px; border-color: gray:">
                        
                    <th style="border-color: gray;border-left:thick solid; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Package</th>
                <th style="border-color: gray; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Duration</th>
                <th  style="border-color: gray;border-right: thick solid; border-top: thick solid;border-bottom:thick solid; text-align: right;border-color: gray;" >Amount</th>
                </tr>
                </thead>
       <tbody>
                    <tr>
                        <td style="border-color: gray;border-left:thick solid;border-color: gray;">{{$scheme->schemename}}</td>
                      
                        <td>{{date('j F, Y', strtotime($memberpackage->joindate))}}  to {{date('j F, Y', strtotime($memberpackage->expiredate))}}</td>
                          <td  style="border-color: gray;text-align: right;border-color: gray; border-right:thick solid;border-color: gray;"
                          ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ $scheme->baseprice }}</td>
                    </tr>
                 
                  <!--   <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                         
                          
                        </td>
                        <td  style="text-align: right">  <b>SubTotal</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$scheme->actualprice }}</td>
                    </tr> -->
                     @if($discount > 0 )
                    <tr>

                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                         
                          
                        </td>
                        <td  style="text-align: right">  <b>Discount </b></td>
                        <td  style="border-color: gray; text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>   {{$discount}}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                            
                        </td>
                        <td style="text-align: right"><b>GST ( {{ $scheme->tax }} %)</b></td>
                        <td  style="text-align: right;border-right:thick solid;border-color: gray;" border-right:thick solid;><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{($scheme->actualprice)-($scheme->baseprice) }}</td>
                    </tr>
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                        
                        </td>
                        <td  style="border-color: gray;text-align: right;border-color: gray"><b>Total</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$payment[0]->actualamount}}</td>
                    </tr>
                     <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-bottom:thick solid;border-color: gray;">
                        
                        </td>
                        <td  style="border-color: gray;text-align: right;border-bottom:thick solid;border-color: gray;"><b>Total In Words</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid; border-bottom:thick solid;border-color: gray; "> {{$word}} 
                      
                        </td>
                    </tr>
                </tbody>
            </table>
         
        </div>
         <font size="1">
            <table style="margin: 5px;  margin-top:60px;" width=100% cellpadding="5px;" cellspacing="0px">
                <thead>
                     <tr><th style="border:none; width: 160px;"><font size="3">Payment Information</font></th></tr><tr style="border-color: gray;border-right: thick solid; border-left: thick solid; border-top: thick solid;border-bottom:thick solid; border:1px;border-color: gray;">
                    <th style=" border-color: gray;border-left: thick solid; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Date</th>
                <th style="border-top: thick solid;border-bottom:thick solid;border-color: gray;">Payment Type</th>
                  <th style="border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">Cheque/
                    <br>Card Info</th>
                    <th style=" border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">Collected By</th>
                     <th style="border-color: gray; border-top: thick solid;border-bottom:thick solid;border-color: gray; width: 100px;">Details</th>
                <th  style="border-color: gray;border-right: thick solid; border-top: thick solid;border-bottom:thick solid; text-align: right;border-color: gray;">Amount</th>
                </tr>
                </thead>
       <tbody>
                   
                      @foreach($payment as $key=>$payment)
                   
                    <tr>
                     
                        <td style="width: 120px; border-color: gray;border-left:thick solid;border-color: gray;">{{date('j F, Y', strtotime($payment->paymentdate))}}</td>
                       <td>{{$payment->mode}}</td>
                        <td>{{$payment->remarks}}</td>
                        <td>{{session('username')}}</td>
                         @php
            $percentage = $tax;
             $perc = ($percentage / 100) * $payment->amount;
             @endphp
            <td style="border-color: gray;border-color: gray; width: 100px;">Amount :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$payment->amount - $perc}} <br>
            Tax :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$perc}} </td>
                        <td style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$payment->amount}}</td>
                       
                    </tr>


                     @endforeach
                     <tr>
                       
                        <td style="border-color: gray;border-left:thick solid;border-color: gray;"></td>
                       <td></td>
                       <td><b>Total</b></td>
                        <td></td>
                        
                         <td style="width: 100px;"></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{($payment->actualamount) - ($payment->remainingamount) }}</td>
                     </tr> 
                     @if($totalpay)
                       <tr>
                       
                        <td style="border-color: gray;border-left:thick solid; border-bottom: thick solid; border-color: gray;"></td>
                       <td style="border-color: gray;border-bottom: thick solid;border-color: gray;"></td>
                           <td style="border-color: gray;border-bottom: thick solid;border-color: gray;"><b>Total In Words</b></td>
                       
                        <td colspan="3" style="border-color: gray;text-align: right;border-right:thick solid;border-bottom: thick solid;border-color: gray;"> {{  $totalpay}}</td>
                     </tr> 
                     @endif
                   </tbody>
            </table>
<div>
     @if($payment->actualamount == (($payment->actualamount) - ($payment->remainingamount)))
                 @php  $duedate = 0 ; @endphp
                   @endif
  
    @if($duedate)
    <table style="margin: 5px;  margin-top:60px;" width=100%  cellpadding="5px;" cellspacing="0px">
         <thead>
             <tr><th style="border:none;"><font size="3">Due Information</font></th></tr>
             <tr style="border-color: gray;border-right: thick solid; border-left: thick solid;border-color: gray; border-top: thick solid;border-bottom:thick solid; border:1px;border-color: gray;">
            <th style="border-color: gray;border-left: thick solid; border-top: thick solid;border-color: gray;border-bottom:thick solid;border-color: gray;">Due Date</th>
                <th style=" border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">State</th>
                 
                    
                <th  style="border-color: gray;border-right: thick solid; border-top: thick solid;border-bottom:thick solid; text-align: right; border-right:thick solid;border-color: gray;">Amount</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-color: gray;border-left: thick solid;border-bottom: thick solid;border-color: gray;">
                            {{date('j F, Y', strtotime($duedate))}}
                        </td>
                        <td style="border-color: gray;border-bottom: thick solid;border-color: gray;">Due Date Scheduled</td>
                        <td style="border-color: gray;text-align: right;border-bottom: thick solid; border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ $payment->remainingamount }}</td>
                    </tr>
                </tbody>
    </table>
    @endif
       </font>
         </div>
            <br>
            <br>
            <br>
             <table  width="100%"> 
                <br>
                <br><br>
                <br>
                <br>
          <tr>
            <td style="border:none">
               MEMBER  SIGNATURE<br/>
            </td>
         

          <td  style="border:none; text-align:right;">  ADMIN SIGNATURE</td></tr></table>
        </div>
    </body>
</html>  
         