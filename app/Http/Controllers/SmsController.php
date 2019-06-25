<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Notifications\Notification;
use Notification\SMSNotification;
use App\Sms;
use Curl;

class SmsController extends Controller
{
   public function sendsms(){

   		 	$q = '918200406933';

   		 // $url = "http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number=918200406933&text=message&route=6";	 
   		
   		$response = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number={$q}&text=testmessage&route=6')->get();

         // $q = 'sdrgs';
         
         // return response($q);

   }



   public function getCURL()
    {
        $q = '918200406933';

        $response = Curl::to('http://vsms.vr4creativity.com/api/mt/SendSMS?user=feetness5b&password=five@feetb&senderid=FITFIV&channel=Trans&DCS=0&flashsms=0&number='.$q.'&text=message&route=6')
                            ->get();

         $q = 'sdrgs';
         
         return response($q);                   

       
    }



}
