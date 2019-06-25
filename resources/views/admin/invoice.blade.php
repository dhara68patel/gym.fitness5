<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <style>
        td {
            border-bottom: 1px solid #ddd;
            margin: 5px;
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
                <b>Invoice No:</b>{{$request->RecieptNo}} 
                <br>
                <b>Date:</b>{{date('j F, Y', strtotime($request->PaymentDate))}}
                <br>
             <b>MemberId:{{$memberId}}</b>
                <br>
                <b>{{$member->firstname}} {{$member->lastname}}</b>
                <br>
                <b>Mobile No.</b>{{$phoneno}}
                @if($companyName)
                <br> By {{ $companyName  }}
                <br> GST No:{{ $Gstno }}
                @endif
            </div>
        
        </div>
        <br>
        <br>
        <br>
       
        <div>
            
            <br>
            
            <font size="2">
                
                 <table style="margin: 5px;  margin-top:70px;" width=100% cellpadding="5px;" cellspacing="0px">

                <thead>
                    <tr><th style="border:none;"><font size="3">Package Information</font></th></tr>
                    <tr style="border-color: gray; border-left: thick solid; border-top: thick solid;border-bottom:bold solid; border:1px;border-color: gray;">
                        
                    <th style="border-color: gray;border-left:thick solid; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Package</th>
                <th style="border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">Duration</th>
                <th  style="border-right: thick solid;  border-top: thick solid;border-bottom:thick solid; text-align: right;border-color: gray;">Amount</th>
                </tr>
                </thead>
       <tbody>
                    <tr>
                        <td style="border-color: gray;border-left:thick solid;border-color: gray;">{{$scheme->SchemeName}}</td>
                      
                        <td style="border-color: gray;">{{date('j F, Y', strtotime($request->Join_date))}} to {{date('j F, Y', strtotime($request->Expire_date))}}</td>
                          <td  style="border-color: gray;text-align: right; border-right:thick solid;border-color: gray;"
                          ><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ $scheme->BasePrice }}</td>
                    </tr>
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                            
                        </td>
                        <td style="border-color: gray;text-align: right;border-color: gray;"><b>GST ( {{ $scheme->Tax }} %)</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid; border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> 
                            {{($scheme->ActualPrice)-($scheme->BasePrice) }}</td>
                    </tr>
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                         
                          
                        </td>
                        <td  style="border-color: gray;text-align: right;border-color: gray;">  <b>SubTotal</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$scheme->ActualPrice }}</td>
                    </tr>
                    @if($discount > 0 )
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                         
                          
                        </td>
                        <td  style="border-color: gray;text-align: right;border-color: gray;">  <b>Discount </b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>   {{$discount}}</td>
                    </tr>
                 @endif
                    <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                        
                        </td>
                        <td  style="border-color: gray;text-align: right;border-color: gray;"><b>Total</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$request->ActualAmount}}</td>
                    </tr>
                     <tr>
                        <td colspan="1"style="border-color: gray;border-left:thick solid;border-color: gray;">
                        
                        </td>
                        <td  style="border-color: gray;text-align: right;border-color: gray;"><b>Total In Words</b></td>
                        <td  style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;">{{$word}} </td>
                    </tr>
                </tbody>
            </table>
            </font>
        </div>
        <font size="1">
            <table style="margin: 5px;  margin-top:70px;" width=100% cellpadding="5px;" cellspacing="0px">
                <thead>
                     <tr><th style="border:none;"><font size="3">Payment Information</font></th></tr>
                     <tr style="border-color: gray;border-right: thick solid; border-left: thick solid; border-top: thick solid;border-bottom:thick solid; border:1px;border-color: gray;">
                    <th style="border-color: gray; border-left: thick solid; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Date</th>
                <th style="border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">Payment Type</th>
                  <th style="border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">Cheque/Card Info</th>
                    <th style="border-color: gray; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Collected By</th>
                      <th style="border-color: gray; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Details</th>
                <th  style="border-color: gray;border-right: thick solid; border-top: thick solid;border-bottom:thick solid; text-align: right;border-color: gray;" >Amount</th>
                </tr>
                </thead>
       <tbody>@if($request->Mode != 'no mode')
       @foreach($request->Mode as $key=>$r)
       <tr>
 
        <td style="border-color: gray; border-left:thick solid;border-color: gray;">{{date('j F, Y', strtotime($request->PaymentDate))}}</td>
        <td style="border-color: gray;border-color: gray;">
        @foreach($PaymentType as $p)

           {{ $request->Mode[$key] ==  $p->id ? $p->PaymentType : ''}}
           @endforeach
           </td>

            <td style="border-color: gray;border-color: gray;">{{$request->Remark[$key]}}   </td>
            <td style="border-color: gray;border-color: gray;">{{'Vicky Shah'}}</td>
            @php
            $percentage = $tax ;
             $perc = ($percentage / 100) * $request->Amount[$key];
             @endphp
            <td style="border-color: gray;border-color: gray;"> Amount :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$request->Amount[$key] - $perc}} <br>
            Tax :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$perc}} </td>
         <td style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>  {{$request->Amount[$key]}}
           </td>
       </tr>
       @endforeach
       @else
        <tr>
      @php $total = '0' @endphp
        <td style="border-color: gray; border-left:thick solid;border-color: gray;">{{date('j F, Y', strtotime($request->PaymentDate))}}</td>
        <td style="border-color: gray;border-color: gray;">
        {{'no  mode'}}
           </td>

            <td style="border-color: gray;border-color: gray;">{{$request->Remark}}   </td>
            <td style="border-color: gray;border-color: gray;">{{'Vicky Shah'}}</td>
            @php
            $percentage = $tax ;
             $perc = ($percentage / 100) * $request->Amount;
             @endphp
            <td style="border-color: gray;border-color: gray;"> Amount :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$request->Amount - $perc}} <br>
            Tax :<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$perc}} </td>
         <td style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>  {{'0'}}
           </td>
       </tr>
         @endif
                     <tr>
                       
                        <td style="border-color: gray;border-left:thick solid;border-color: gray;"></td>
                       <td style="border-color: gray;border-color: gray;"></td>
                  <td style="border-color: gray;border-color: gray;"></td>
                        <td style="border-color: gray;border-color: gray;"><b>Total</b></td>
                        <td style="border-color: gray;border-color: gray;"></td>
                        <td style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{$total}}</td>
                     </tr> 
                     <tr style="border-color: gray;border-bottom: thick solid;border-color: gray;">
                         <td style="border-color: gray;border-left:thick solid;border-color: gray;"></td>
                         <td style="border-color: gray;border-color: gray;"></td>
                         <td style="border-color: gray;border-color: gray;"></td>

                         <td style="border-color: gray;border-color: gray;"><b>Total in words</b></td>
                         <td style="border-color: gray;border-color: gray;"></td>
                         <td style="border-color: gray;text-align: right;border-right:thick solid;border-color: gray;">{{$actual_in_word}}</td>
                     </tr>
                   </tbody>
            </table>
<div>
 
    @if($duedate)


    <br><br>

    <table style="margin: 5px;  margin-top:70px;" width=100%  cellpadding="5px;" cellspacing="0px">
         <thead>
             <tr><th style="border:none;">Due Information</th></tr>
             <tr style="border-color: gray;border-right: thick solid; border-left: thick solid; border-top: thick solid;border-bottom:thick solid; border:1px;border-color: gray;">
            <th style="border-color: gray;border-left: thick solid; border-top: thick solid;border-bottom:thick solid;border-color: gray;">Due Date</th>
                <th style=" border-color: gray;border-top: thick solid;border-bottom:thick solid;border-color: gray;">State</th>
                 
                    
                <th  style="border-color: gray;border-right: thick solid; border-top: thick solid;border-bottom:thick solid; text-align: right; border-right:thick solid;border-color: gray;">Amount</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-color: gray;border-left:thick solid;border-color: gray;">
                            {{date('j F, Y', strtotime($duedate))}}
                        </td>
                        <td style="border-color: gray;border-color: gray;">Due Date Scheduled</td>
                        <td style="border-color: gray;text-align: right; border-right:thick solid;border-color: gray;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> {{ $remainingAmount }}</td>
                    </tr>
                </tbody>
    </table>
</div>
</font>
    @endif
        
            <br>
            <br>
             <table  width="100%"> 
          <tr>
            <td style="border:none">
               MEMBER  SIGNATURE<br/>
            </td>
         

          <td  style="border:none; text-align:right;">  ADMIN SIGNATURE</td></tr></table>
        </div>
    </body>
</html>  
         